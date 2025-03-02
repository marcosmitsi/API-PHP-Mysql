<?php
//Adicionando o @ na frente da variavel global $_GET o sistema não informa Avisos.
echo @$_GET['url'];


if(@$_GET['url'])
{
    $url = explode('/', $_GET['url']); //separa os parametrospela '/' e armazena na variavel como vetor

    echo'<pre>';
    var_dump($url);
    echo'</pre>';

if($url[0] === 'api')
{
    //remover posisão [0] do vetor
    array_shift($url);

    echo'<pre> <br><br>';
    var_dump($url);
    echo'</pre>';

    $service = ucfirst($url[0])."Service";// ucfirst transforma a primeira letra para maiúsculo

    echo'<pre> <br><br>';
    var_dump($service);
    echo'</pre>';
    
    
    // Pegar o Metodo da ação

    $metodo = strtolower($_SERVER['REQUEST_METHOD']);
    echo'<pre> <br><br>';
    var_dump($metodo);
    echo'</pre>';


}else{
    echo "EndPont incorreto";

}




}else{
    echo "EndPont incorreto";

}



