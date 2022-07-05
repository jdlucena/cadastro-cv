<?php

namespace PayTour\Classes;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Cadastrar extends \PayTour\Classes\Conexao
{
    private $status = false;

    public function __construct()
    {
        // cadastra o currículo dos usuários
        if (isset($_POST['cadastrar'])) {
            $this->cadastrarCurriculo($_POST);
        }
    }

    // cadastra a pesquisa no banco MySql
    private function cadastrarCurriculo($campos)
    {

        // se existir conexão com o bd
        if (parent::__construct()) {

            // dados do formulário
            $nome = $campos['nome'];
            $email = $campos['email'];
            $telefone = $campos['telefone'];
            $cargo = $campos['cargo'];
            $escolaridade = $campos['escolaridade'];
            $observacoes = $campos['observacoes'];
            $ip = $_SERVER['REMOTE_ADDR'];

            // tratando o arquivo enviado
            $file = $_FILES["arquivo"];

            // arquivo do formulário
            $arquivo = $file["name"];

            // altera o nome para ficar único
            $nomeFinal = md5($arquivo . date('Y-m-s'));

            // currículos permitidos nos formatos .doc, .docx ou .pdf
            $arquivosPermitidos = ['.doc', '.docx', '.pdf'];

            // pega a extensão do arquivo
            $tipo = strrchr($file["name"], ".");

            // tamanho do arquivo
            $tamanho = $file["size"];

            // verifica se a extensão é permitida
            if (!in_array($tipo, $arquivosPermitidos)) {
                $this->errors[] = EXTENSAO_INVALIDA;
                $this->status = false;
            } elseif ($tamanho > 1000000) { // verifica se o tamanho é maior que 1MB
                $this->errors[] = TAMANHO_MAXIMO;
                $this->status = false;
            } else {

                // local para armazenar os currículos
                $dir = "arquivos/";

                // move o arquivo para a pasta destino
                if (move_uploaded_file($file["tmp_name"], "$dir/" . $nomeFinal . $tipo)) {

                    // gravando questionario no banco
                    $query_new_registro = $this->db_connection->prepare("INSERT INTO `curriculos` (`id`, `nome`, `email`, `telefone`, 
                    `cargoDesejado`, `escolaridade`, `observacoes`, `arquivo`, `dataEnvio`, `ipUsuario`) VALUES (NULL, '{$nome}', 
                    '{$email}', '{$telefone}', '{$cargo}', '{$escolaridade}', '{$observacoes}', '{$nomeFinal}', NOW(), '{$ip}');");
                    $query_new_registro->execute();

                    // verifica se afetou alguma linha
                    if ($query_new_registro->rowCount()) {
                        $this->messages[] = CADATRO_SUCESSO;
                        $this->status = true;

                        $mail = new PHPMailer(true);

                        try {
                            // Server settings
                            $mail->isSMTP();
                            $mail->Host       = EMAIL_HOST;
                            $mail->SMTPAuth   = true;
                            $mail->Username   = EMAIL_USERNAME;
                            $mail->Password   = EMAIL_PASSWORD;
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mail->Port       = 465;

                            // Recipients
                            $mail->setFrom(EMAIL_HOST, 'Contato PayTour');
                            $mail->addAddress($email, $nome);

                            // Content
                            $mail->isHTML(true);
                            $mail->Subject = 'CV cadastrado com sucesso';
                            $mail->Body    = "<b>Currículo cadastrado com sucesso!</b><p><b>Nome completo:</b> {$nome}</p><p><b>E-mail:</b> {$email}</p>
                            <p><b>Telefone:</b> {$telefone}</p><p><b>Cargo desejado:</b> {$cargo}</p><p><b>Escolaridade:</b> {$escolaridade}</p>
                            <p><b>Observações:</b> {$observacoes}</p>";

                            $mail->send();
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        $this->errors[] = FALHA_CADASTRO;
                        $this->status = false;
                    }
                } else {
                    $this->errors[] = FALHA_ENVIO;
                    $this->status = false;
                }
            }
        }
    }

    public function retornaStatus()
    {
        return $this->status;
    }

    
}
