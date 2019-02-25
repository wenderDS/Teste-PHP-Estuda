<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 22:06
 */

namespace App\Src\Cliente\Model\Entity;

use DateTime;

class Cliente
{
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $dataNascimento;
    private $generoId;
    private $genero;

    public function __construct()
    {
        $this->genero = new Genero();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento()
    {
        return new DateTime($this->dataNascimento);
    }

    public function setGeneroId($generoId)
    {
        $this->generoId = $generoId;
    }

    public function getGeneroId()
    {
        return $this->generoId;
    }

    public function getGenero()
    {
        return $this->genero;
    }
}