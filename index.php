<?php
require_once 'app/Config.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Prova Superl&oacute;gica</title>
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
    </container>

    <script>
      class FormView 
      {
        $fieldName;
        $fieldLogin;
        $fieldCep;
        $fieldEmail;
        $fieldSenha;

        static validate() 
        {
          this.$fieldName = document.getElementById('name');
          this.$fieldLogin = document.getElementById('userName');
          this.$fieldCep = document.getElementById('zipCode');
          this.$fieldEmail = document.getElementById('email');
          this.$fieldSenha = document.getElementById('password');

          if(!this.hasValue()) return false;
          
          return this.checkPassword();          
        }

        static hasValue() 
        {
          if (!this.$fieldName.value) {
            this.setWarning(this.$fieldName, 'Por favor, informe seu nome completo!');
            return false;
          } else if (!this.$fieldLogin.value) {
            this.setWarning(this.$fieldLogin, 'Por favor, informe seu nome de login!');
            return false;
          } else if (!this.$fieldCep.value) {
            this.setWarning(this.$fieldCep, 'Por favor, informe seu cep!');
            return false;
          } else if (!this.$fieldEmail.value) {
            this.setWarning(this.$fieldEmail, 'Por favor, informe seu email!');
            return false;
          } else if (!this.$fieldSenha.value) {
            this.setWarning(this.$fieldSenha, 'Por favor, informe sua senha!');
            return false;
          } else return true;
        }

        static checkPassword()
        {
          if(this.$fieldSenha.value.length < 8){
            this.setWarning(this.$fieldSenha, 'A senha deve conter 8 caracteres no m\u00ednimo!');
            return false;
          }

          let counter = this.getCountNumbersLetters(this.$fieldSenha);

          if(counter.letras < 1){
            this.setWarning(this.$fieldSenha, 'A senha deve conter pelo menos uma letra!');
            return false;
          }

          if(counter.numeros < 1){
            this.setWarning(this.$fieldSenha, 'A senha deve conter pelo menos um n\u00famero!');
            return false;
          }

          return true;
        }

        static setWarning($field, msg) 
        {
          alert(msg);
          $field.focus();
        }

        static getCountNumbersLetters($field)
        {
          let splitValue = $field.value.split('');
          let letras  = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','w','y','z'];
          let numeros = ['0','1','2','3','4','5','6','7','8','9'];
          let letterCounter = 0;
          let numberCounter = 0;
          
          splitValue.forEach(row => {
            letras.forEach(l => { if(row === l) letterCounter++ })
            numeros.forEach(n => { if(row === n) numberCounter++ })
          })

          return {letras : letterCounter, numeros : numberCounter};
        }

        static format(campo, mascara, evento) 
        {
          var boleanoMascara;

          var Digitato = evento.keyCode;
          var exp = /\-|\.|\/|\(|\)| /g
          var campoSoNumeros = campo.value.toString().replace(exp, "");

          var posicaoCampo = 0;
          var NovoValorCampo = "";
          var TamanhoMascara = campoSoNumeros.length;;

          if (Digitato != 8) { // backspace 
            for (var i = 0; i <= TamanhoMascara; i++) {
              boleanoMascara = ((mascara.charAt(i) == "-") || (mascara.charAt(i) == ".") ||
                (mascara.charAt(i) == "/"))
              boleanoMascara = boleanoMascara || ((mascara.charAt(i) == "(") ||
                (mascara.charAt(i) == ")") || (mascara.charAt(i) == " "))
              if (boleanoMascara) {
                NovoValorCampo += mascara.charAt(i);
                TamanhoMascara++;
              } else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
              }
            }
            campo.value = NovoValorCampo;
            return true;
          } else return true;         
        }

      }
    </script>
</body>

</html>