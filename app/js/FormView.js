class FormView {
    $fieldName;
    $fieldLogin;
    $fieldCep;
    $fieldEmail;
    $fieldSenha;

    static validate() {
        this.$fieldName = document.getElementById('name');
        this.$fieldLogin = document.getElementById('userName');
        this.$fieldCep = document.getElementById('zipCode');
        this.$fieldEmail = document.getElementById('email');
        this.$fieldSenha = document.getElementById('password');

        if (!this.hasValue()) return false;

        return this.checkPassword();
    }

    static hasValue() {
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

    static checkPassword() {
        if (this.$fieldSenha.value.length < 8) {
            this.setWarning(this.$fieldSenha, 'A senha deve conter 8 caracteres no m\u00ednimo!');
            return false;
        }

        let counter = this.getCountNumbersLetters(this.$fieldSenha);

        if (counter.letras < 1) {
            this.setWarning(this.$fieldSenha, 'A senha deve conter pelo menos uma letra!');
            return false;
        }

        if (counter.numeros < 1) {
            this.setWarning(this.$fieldSenha, 'A senha deve conter pelo menos um n\u00famero!');
            return false;
        }

        return true;
    }

    static setWarning($field, msg) {
        alert(msg);
        $field.focus();
    }

    static getCountNumbersLetters($field) {
        let splitValue = $field.value.split('');
        let letras = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'w', 'y', 'z'];
        let numeros = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        let letterCounter = 0;
        let numberCounter = 0;

        splitValue.forEach(row => {
            letras.forEach(l => { if (row === l) letterCounter++ })
            numeros.forEach(n => { if (row === n) numberCounter++ })
        })

        return { letras: letterCounter, numeros: numberCounter };
    }

    static format(campo, mascara, evento) {
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