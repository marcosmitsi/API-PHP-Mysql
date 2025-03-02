<?php

include_once 'config.php';

class Alunos
{
    public static function insert($dados)
    {
        $tabela = 'alunos';

        $conexao = new PDO(dbDrive . ':host=' . dbHost . '; dbname=' . dbName, dbUser, dbPass);

        $sql = "INSERT INTO $tabela (nome, email, telefone) VALUES(:nome, :email, :telefone)";

        // Mapear os Parametros para obter os dados da inclusão

        $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $dados['nome']);
        $stm->bindValue(':email', $dados['email']);
        $stm->bindValue(':telefone', $dados['telefone']);

        $stm->execute();

        if ($stm->rowCount() > 0) {
            return "Dados cadastrados com sucesso";
        } else {
            return "Erro ao gravar os dados";
        }

    }
}