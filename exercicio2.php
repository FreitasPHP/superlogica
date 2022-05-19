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
        <div class="card" style="width: 32rem;">
            <img class="card-img-top" src="https://media.treasy.com.br/media/2019/10/logosuperlogica.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Exerc&iacute;cio 2</h5>
                <p class="card-text">
                <ol>
                    <li>
                        <pre>Crie um array:</pre>
                        <code>$numeros = [];</code>
                    </li>
                    <hr>
                    <li>
                        <pre>Popule este array com 7 n&uacute;meros:</pre>
                        <code>
                            for($i = 1; $i < 8; $i++) {<br>
                                &nbsp;&nbsp;&nbsp;$numeros[] = $i;<br>
                            }
                        </code>
                    </li>
                    <hr>
                    <li>
                        <pre>Imprima o n&uacute;mero da posi&ccedil;&atilde;o 3 do array:</pre>
                        <code>
                            echo $numeros[3];
                        </code>
                    </li>
                    <hr>
                    <li>
                        <pre>Crie uma vari&aacute;vel com todas as posi&ccedil;&otilde;es <br>do array no formato de string separado por <br>v&iacute;rgula:</pre>
                        <code>
                            $strNumeros = '';<br>
                            foreach ($numeros as $num) {<br>
                                &nbsp;&nbsp;&nbsp;$strNumeros .= "{$num},";<br>
                            }<br>
                            // Retira a &uacute;ltima v&iacute;rgula.<br>
                            $strNumeros = substr($strNumeros, 0, -1);
                        </code>
                    </li>
                    <hr>
                    <li>
                        <pre>Crie um novo array a partir da vari&aacute;vel no <br>formato de string que foi criada e destrua <br>o array anterior:</pre>
                        <code>
                            $numerosNovo = explode(',', $strNumeros);<br>
                            unset($numeros);
                        </code>    
                    </li>
                    <hr>
                    <li>
                        <pre>Crie uma condi&ccedil;&atilde;o para verificar se existe <br>o valor 14 no array:</pre>
                        <code>
                            $exists = in_array(14, $numerosNovo) ? 'sim' : 'n&atilde;o';<br>
                        </code>
                    </li>
                    <hr>
                    <li>
                        <pre>Fa&ccedil;a uma busca em cada posi&ccedil;&atilde;o. Se o n&uacute;mero da posi&ccedil;&atilde;o <br>atual for menor que o da posi&ccedil;&atilde;o anterior <br>(valor anterior que n&atilde;o foi exclu&iacute;do do array ainda), <br>exclua esta posi&ccedil;&atilde;o.</pre>
                        <code>
                        for($i = 0; $i < count($numerosNovo) + 1; $i++){ <br>
                            &nbsp;&nbsp;&nbsp;$anterior = $i - 1; <br>
                            &nbsp;&nbsp;&nbsp;if(array_key_exists($anterior, $numerosNovo)){ <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($numerosNovo[$i] < $numerosNovo[$anterior]){<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unset($numerosNovo[$i]); <br>           
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} <br>
                                    &nbsp;&nbsp;&nbsp;} <br>        
                        }
                        </code>
                    </li>
                    <hr>
                    <li>
                        <pre>Remova a &uacute;ltima posi&ccedil;&atilde;o deste array:</pre>
                        <code>array_pop($numerosNovo);</code>
                    </li>
                    <hr>
                    <li>
                        <pre>Conte quantos elementos tem neste array:</pre>
                        <code>echo count($numerosNovo);</code>
                    </li>
                    <hr>
                    <li>
                        <pre>Inverta as posi&ccedil;&otilde;es deste array:</pre>
                        <code>
                            $numerosNovoReverse = array_reverse($numerosNovo, true);<br>
                            // Inverte a posi&ccedil;&atilde;o, mantendo os &&iacute;ndices.
                        </code>
                    </li>
                </ol>
                </p>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
    <?php
    $numeros = [];

    for ($i = 1; $i < 8; $i++) $numeros[] = rand(1, 100);

    print_r($numeros);

    echo '<br>';

    echo $numeros[3];

    echo '<br>';

    $strNumeros = '';
    foreach ($numeros as $num) {
        $strNumeros .= "{$num},";
    }
    // Retira a última vírgula.
    $strNumeros = substr($strNumeros, 0, -1);
    echo $strNumeros;

    echo '<br>';

    $numerosNovo = explode(',', $strNumeros);
    unset($numeros);
    print_r($numerosNovo);
    echo '<br>';

    $exists = in_array(14, $numerosNovo) ? 'sim' : 'n&atilde;o';
    echo $exists;
    echo '<br>';
        

    for($i = 0; $i < count($numerosNovo) + 1; $i++){
        $anterior = $i - 1;
        if(array_key_exists($anterior, $numerosNovo)){
            if($numerosNovo[$i] < $numerosNovo[$anterior]){
                unset($numerosNovo[$i]);            
            }
        }        
    }
    print_r($numerosNovo);
    
    echo '<br>';

    array_pop($numerosNovo);
    print_r($numerosNovo);

    echo '<br>';
    echo count($numerosNovo);

    echo '<br>';
    $numerosNovoReverse = array_reverse($numerosNovo, true); 
    print_r($numerosNovoReverse);
    ?>
</body>

</html>