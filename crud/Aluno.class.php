<?php
/**
 * Created by PhpStorm.
 * User: deders
 * Date: 22/05/15
 * Time: 00:12
 */

class Aluno
{
    private $db;
    private $id;
    private $nome;
    private $nota;

    public function __construct(\PDO $db)
    {
        $this->db = $db;

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
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nota', $this->getNota());

        if ($stmt->execute()){
            return true;
        }

    }

    public function alterar()
    {
        $query = "update alunos set nomealuno=:nome, notaaluno=:nota where idalunos=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nota', $this->getNota());

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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }
}