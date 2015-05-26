<?php
/**
 * Created by PhpStorm.
 * User: deders
 * Date: 24/05/15
 * Time: 12:44
 */

class ServiceDb
{
    private $db;
    private $aluno;

    public function __construct(\PDO $db, Aluno $aluno)
    {
        $this->db = $db;
        $this->aluno = $aluno;
    }

    public function findById($id)
    {
        $query = "select * from alunos where idalunos=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar()
    {
        $query = "select * from alunos order by idalunos DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function inserir()
    {
        $query = "Insert into alunos (nomealuno, notaaluno) Values (:nome, :nota)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->aluno->getNome());
        $stmt->bindValue(':nota', $this->aluno->getNota());

        if ($stmt->execute()){
            return true;
        }

    }

    public function alterar()
    {
        $query = "update alunos set nomealuno=:nome, notaaluno=:nota where idalunos=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->aluno->getId());
        $stmt->bindValue(':nome', $this->aluno->getNome());
        $stmt->bindValue(':nota', $this->aluno->getNota());

        if ($stmt->execute()){
            return true;
        }

    }

    public function deletar($id)
    {
        $query = "delete from alunos where idalunos=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()){
            return true;
        }

    }

}