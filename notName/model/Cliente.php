<?php

class Cliente
{

    public $idCli;

    public $nomeCli;

    public $rgCli;

    public $cpfCli;

    public $nascCli;

    public $generoCli;

    public $telResiCli;

    public $telCelCli;

    public $telComCli;

    public $emailCli;

    public $senhaCli;

    public $dtUltAccessCli;

    public $statusCli;

    public $prefCli;

    public $enderecoCli;

    public function getIdCli()
    {
        return $this->idCli;
    }

    public function setIdCli($idCli)
    {
        $this->idCli = $idCli;
    }

    public function getNomeCli()
    {
        return $this->nomeCli;
    }

    public function setNomeCli($nomeCli)
    {
        $this->nomeCli = $nomeCli;
    }

    public function getRgCli()
    {
        return $this->rgCli;
    }

    public function setRgCli($rgCli)
    {
        $this->rgCli = $rgCli;
    }

    public function getCpfCli()
    {
        return $this->cpfCli;
    }

    public function setCpfCli($cpfCli)
    {
        $this->cpfCli = $cpfCli;
    }

    public function getNascCli()
    {
        return $this->nascCli;
    }

    public function setNascCli($nascCli)
    {
        $this->nascCli = $nascCli;
    }

    public function getGeneroCli()
    {
        return $this->generoCli;
    }

    public function setGeneroCli($generoCli)
    {
        $this->generoCli = $generoCli;
    }

    public function getTelResiCli()
    {
        return $this->telResiCli;
    }

    public function setTelResiCli($telResiCli)
    {
        $this->telResiCli = $telResiCli;
    }

    public function getTelCelCli()
    {
        return $this->telCelCli;
    }

    public function setTelCelCli($telCelCli)
    {
        $this->telCelCli = $telCelCli;
    }

    public function getTelComCli()
    {
        return $this->telComCli;
    }

    public function setTelComCli($telComCli)
    {
        $this->telComCli = $telComCli;
    }

    public function getEmailCli()
    {
        return $this->emailCli;
    }

    public function setEmailCli($emailCli)
    {
        $this->emailCli = $emailCli;
    }

    public function getSenhaCli()
    {
        return $this->senhaCli;
    }

    public function setSenhaCli($senhaCli)
    {
        $this->senhaCli = $senhaCli;
    }

    public function getDtUltAccessCli()
    {
        return $this->dtUltAccessCli;
    }

    public function setDtUltAccessCli($dtUltAccessCli)
    {
        $this->dtUltAccessCli = $dtUltAccessCli;
    }

    public function getStatusCli()
    {
        return $this->statusCli;
    }

    public function setStatusCli($statusCli)
    {
        $this->statusCli = $statusCli;
    }

    public function getPrefCli()
    {
        return $this->prefCli;
    }

    public function setPrefCli($prefCli)
    {
        $this->prefCli = $prefCli;
    }

    public function getEnderecoCli()
    {
        return $this->enderecoCli;
    }

    public function setEnderecoCli($enderecoCli)
    {
        $this->enderecoCli = $enderecoCli;
        
        return $this;
    }
}