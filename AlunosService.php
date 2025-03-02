<?php

include_once 'Alunos.php';

class AlunosService
{
    public function post()
    {
        $dados = json_decode(file_get_contents('php://input'), true, 512);
        if ($dados == null) {
            throw new Exception("Falta dados para Incluir");
        }

        return Alunos::insert($dados);

    }
}