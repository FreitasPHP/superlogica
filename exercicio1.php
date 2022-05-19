<?php
require_once 'app/Config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= Config::PAGE_TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form id="formUser" method="post" action="<?= Config::ACTION_FORM ?>" onSubmit="return FormView.validate();">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <label for="name" class="form-label">Nome completo:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-4 col-xs-12">
                    <label for="userName" class="form-label">Nome de login:</label>
                    <input type="text" class="form-control" id="userName" name="userName">
                </div>
                <div class="col-md-4 col-xs-12">
                    <label for="zipCode" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="zipCode" name="zipCode" maxlength="9" onkeyup="return FormView.format(this,'00000-000', event);">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6 col-xs-12">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">8 caracteres no m&iacute;nimo, contendo pelo menos 1 letra
                        e 1 n&uacute;mero.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <button type="submit" class="btn btn-primary" id="sendForm">Enviar</button>
                </div>
            </div>
            <input type="hidden" name="acao" value="<?= Config::ACTION_INSERT ?>">
        </form>
    </div>

    <script src="app/js/FormView.js"></script>
</body>

</html>