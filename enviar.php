<?php
//Cria uma variavel que tera os dados do erro.
$erro = false;

//verifica se o POST tem algum valor.
if(!isset($_POST)|| empty($_POST)){
    $erro = 'Nada foi postado';
}

//cria as variaveis dinamicamente.
foreach($_POST as $chave => $valor){
    //remove todas as tagas html.
    //remove os espaços em branco do valor.
    $$chave = trim(strip_tags($valor));

    //verifica se tem algum valor nulo.
    if(empty($valor)){
        $erro = 'Existem campos em branco';
    }
}

//verifica se $idade realmente existe e se é um numero.
//tambem verifica se nao existe nem um erro anterior.
if((!isset($idade) || !is_numeric($idade)) && !$erro){
    $erro = 'A idade deve ser um valor numero.';
}

//verifica se $site realmente existe e se é um URL.
//tambem verifica se nao existe nenhum erro anterior.
if((! isset($site) || !filter_var($site, FILTER_VALIDATE_URL)) && !$erro){
    $erro = 'Envie um site valido.';
}

//verifica se o email realmente existe e se realmente é um email.
//tambem verifica se nao existe nenhum erro anterior.
if((! isset($emai) || ! filter_var($emai, FILTER_VALIDATE_EMAIL)) && !$erro){
    $erro = 'Envie um email valido.';
}

//se existir algum erro mostra o erro.
if($erro){
    echo $erro;
} else {
    //se cair aqui é por que os dados estão validados
    //a partir daqui ja pode enviar os dados para a base de dados se quiser :)
    //eu só vou mostralos na tela mesmo.

    echo "<h1> Veja os dados enviados</h1>";

    foreach($_POST as $chave => $valor){
        echo '<b>' . $chave . '<b>' . $valor . '<br><br>';
    }
}



