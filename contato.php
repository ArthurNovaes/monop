<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MonOP - Contato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/icone.ico">
    <link rel="stylesheet" href="css/header.css">
    <style type="text/css">
    </style>
</head>
<body>
    <div class="container">
      <?php include "header.html"; ?>
      <div class="row">
        <div class="contact" id="contato">
          <form action="" class="form-horizontal">
            <div class="col-sm-offset-4 col-sm-12"><legend style="width:30%;"><h1>Contato</h1></legend></div>
            <div class="form-group">
              <label for="nome" class="col-sm-4 control-label">Nome: </label>
              <div class="col-sm-4">
                <input type="text" id="nome" placeholder="Nome">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Email: </label>
              <div class="col-sm-4">
                <input type="mail" id="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="assunto" class="col-sm-4 control-label">Assunto: </label>
                <div class="col-sm-4">
                  <input type="text" id="assunto" placeholder="Assunto"><br>
                  </div>
            </div>
            <div class="form-group">
              <label for="mensagem" class="col-sm-4 control-label">Mensagem</label>
              <div class="col-sm-4">
                <textarea rows="4" placeholder="Sua Mensagem"></textarea>
              </div>
            </div>
                <input type="submit" value="Enviar Mensagem" />
          </form>
        </div>
      </div>
    </div>
    <?php include "footer.html"; ?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
