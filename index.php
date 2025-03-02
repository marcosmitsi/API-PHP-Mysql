<?php
include_once 'AlunosService.php';

header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Origin: *"); //Necessário Localhost
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 86400");

//Adicionando o @ na frente da variavel global $_GET o sistema não informa Avisos.

//Evite o @, pois mascara erros que podem ser úteis no debug. Melhor abordagem !empty($_GET['url']

if (@$_GET['url']) {
    $url = explode('/', $_GET['url']); //separa os parametrospela '/' e armazena na variavel como vetor


    if ($url[0] === 'api') {
        //remover posisão [0] do vetor
        array_shift($url);

        $servico = ucfirst($url[0]) . "Service";// ucfirst transforma a primeira letra para maiúsculo

        // Pegar o Metodo da ação

        $metodo = $_SERVER['REQUEST_METHOD'];

        try {
            //Chamar Classe responsável pelo serviço
            $resposta = call_user_func_array(array(new $servico, $metodo), $url);
            http_response_code(200);
            return json_encode(array('Retorno' => $resposta), JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(array('erro' => $e), JSON_UNESCAPED_UNICODE);
        }



    } else {
        echo "EndPont incorreto";

    }




} else {
    echo "EndPont incorreto";

}



