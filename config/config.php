<?php

/**
 * Configuração do banco de dados
 * local onde as constantes estão salvas
 *
 * Para mais informações:
 * @see http://php.net/manual/en/function.define.php
 * @see http://stackoverflow.com/q/2447791/1114320
 *
 * DB_HOST: local do banco de dados
 * DB_NAME: nome do banco de dados
 * DB_USER: usuário com direitos para SELECT, UPDATE, DELETE and INSERT. Criar usuário, não colocar root
 * DB_PASS: senha do usuário
 */

// dados do banco MySql
define("DM_HOST", "localhost");
define("DM_NAME", "paytour");
define("DM_USER", "root");
define("DM_PASS", "");

// dados do servidor de e-mail
define("EMAIL_HOST", "smtp.email.com");
define("EMAIL_USERNAME", "email@email.com");
define("EMAIL_PASSWORD", "12345678");

// erros e mensagens
define("EXTENSAO_INVALIDA", "Extensão não permitida");
define("TAMANHO_MAXIMO", "Selecione um arquivo menor que 5MB");
define("CADATRO_SUCESSO", "Currículo cadastrado com sucesso");
define("FALHA_CADASTRO", "Falha no cadastro, tente novamente");
define("FALHA_ENVIO", "Falha no envio do arquivo, tente novamente");

/**
 * Não exibir os erros em produção
 */
#ini_set('display_errors', 0);
#error_reporting(0);