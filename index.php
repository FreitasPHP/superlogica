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
            <form id="formUser" method="post" action="<?=Config::ACTION_FORM?>" onSubmit="return FormView.validate();">
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
                    <input type="text" class="form-control" id="zipCode" name="zipCode">
                  </div>
                </div>                
               <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>                  
                  <div class="col-md-6 col-xs-12">
                    <label for="password" class="form-label">Password</label>
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
                <input type="hidden" name="acao" value="<?=Config::ACTION_INSERT?>">                              
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
              this.$fieldName  = document.getElementById('name');
              this.$fieldLogin = document.getElementById('userName');
              this.$fieldCep   = document.getElementById('zipCode');
              this.$fieldEmail = document.getElementById('email');
              this.$fieldSenha = document.getElementById('password');

              return this.isEmpty();
            }
         
            static isEmpty()
            {              
              if(!this.$fieldName.value){
                this.setWarning(this.$fieldName, 'nome completo');
                return false;                
              }
              else if(!this.$fieldLogin.value){
                this.setWarning(this.$fieldLogin, 'nome de login');
                return false;
              }
              else if(!this.$fieldCep.value){
                this.setWarning(this.$fieldCep, 'cep');
                return false;
              }
              else if(!this.$fieldEmail.value){
                this.setWarning(this.$fieldEmail, 'email');
                return false;
              }
              else if(!this.$fieldSenha.value){
                this.setWarning(this.$fieldSenha, 'password');
                return false;
              } else return true;
            }

            static setWarning($field, $label)
            {
              alert(`Por favor, informe o seu ${$label}!`);
              $field.focus();              
            }

          }
          
        </script>
    </body>
</html>