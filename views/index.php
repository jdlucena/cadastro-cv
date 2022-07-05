<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="">
  <title>PayTour - Cadastro de Currículo</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/appslabke/lara-izitoast/lara-izitoast/assests/iziToast.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="assets/css/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="assets/images/logo.png" alt="" width="" height="57">
        <h2>Faça parte da nossa equipe!</h2>
        <p class="lead">Agradecemos o seu interesse em fazer parte da nossa equipe! Buscamos profissionais comprometidos, que estejam dispostos a aprender e queiram evoluir conosco. Por favor, preencha os campos abaixo e anexe seu currículo clicando em "Escolher arquivo". Entraremos em contato assim que possível!</p>
      </div>

      <div class="row g-5">
        <div class="col-md-12 col-lg-12">
          <form class="needs-validation" method="POST" action="./" enctype="multipart/form-data" novalidate>

            <div class="row g-3 mb-4">
              <div class="col-sm-6">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
                <div class="invalid-feedback">
                  Informe seu nome.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">
                  Informe um e-mail válido.
                </div>
              </div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-sm-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control telefone" name="telefone" id="telefone" required>
                <div class="invalid-feedback">
                  Informe seu telefone.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="cargo" class="form-label">Cargo desejado</label>
                <input type="text" class="form-control" name="cargo" id="cargo" required>
                <div class="invalid-feedback">
                  Informe o cargo desejado.
                </div>
              </div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label for="escolaridade" class="form-label">Escolaridade</label>
                <select class="form-select" name="escolaridade" id="escolaridade" required>
                  <option value="">Selecione</option>
                  <option>Ensino fundamentel</option>
                  <option>Ensino médio</option>
                  <option>Ensino superior</option>
                  <option>Pós-graduação</option>
                  <option>Mestrado</option>
                  <option>Doutorado</option>
                </select>
                <div class="invalid-feedback">
                  Selecione sua escolaridade.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="arquivo" class="form-label">Arquivo</label>
                <input type="file" class="form-select" name="arquivo" id="arquivo" required>
                <div class="invalid-feedback">
                  Selecione seu currículo.
                </div>
              </div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-sm-12">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control" name="observacoes" id="observacoes" rows="5"></textarea>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" name="cadastrar">Enviar currículo</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2022-<?= date('Y') ?> <a href="http://github.com/jdlucena/" target="_blank">JDLucena</a></p>
    </footer>
  </div>


  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="vendor/appslabke/lara-izitoast/lara-izitoast/assests/iziToast.js"></script>
  <script src="vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
  <script src="assets/js/form-validation.js"></script>

  <script>
    // mascará telefone
    $(document).ready(function() {
      var SPMaskBehavior = function(val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
        };

      $('.telefone').mask(SPMaskBehavior, spOptions);
    });

    // evita o reenvio do formulario caso usuario atualize a página
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>

<?php

if (isset($cadastrar)) {
  if ($cadastrar->errors) {
    foreach ($cadastrar->errors as $error) { ?>
      <script>
        iziToast.error({
          title: '<?= $error; ?>',
          position: 'topRight',
          timeout: 7000,
        });
      </script>
    <?php }
  }
  if ($cadastrar->messages) {
    foreach ($cadastrar->messages as $message) { ?>
      <script>
        iziToast.success({
          title: '<?= $message; ?>',
          position: 'topRight',
          timeout: 10000,
        });
      </script>
<?php }
  }
}
?>