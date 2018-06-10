<?php
class UsuarioSys
{
    private $idUsr;
    
    private $loginUsr;
    
    private $senhaUsr;
    
    private $nomeUsr;
    
    private $permissionUsr;
    
    private $statusUsr;
    
    private $email;
   
    /**
     * @return int
     */
    public function getIdUsr()
    {
        return $this->idUsr;
    }

    /**
     * @return string
     */
    public function getLoginUsr()
    {
        return $this->loginUsr;
    }

    /**
     * @return string
     */
    public function getSenhaUsr()
    {
        return $this->senhaUsr;
    }

    /**
     * @return strin
     */
    public function getNomeUsr()
    {
        return $this->nomeUsr;
    }

    /**
     * @return string
     */
    public function getPermissionUsr()
    {
        return $this->permissionUsr;
    }

    /**
     * @return string
     */
    public function getStatusUsr()
    {
        return $this->statusUsr;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $idUsr
     */
    public function setIdUsr($idUsr)
    {
        $this->idUsr = $idUsr;
    }

    /**
     * @param mixed $loginUsr
     */
    public function setLoginUsr($loginUsr)
    {
        $this->loginUsr = $loginUsr;
    }

    /**
     * @param mixed $senhaUsr
     */
    public function setSenhaUsr($senhaUsr)
    {
        $this->senhaUsr = $senhaUsr;
    }

    /**
     * @param mixed $nomeUsr
     */
    public function setNomeUsr($nomeUsr)
    {
        $this->nomeUsr = $nomeUsr;
    }

    /**
     * @param mixed $permissionUsr
     */
    public function setPermissionUsr($permissionUsr)
    {
        $this->permissionUsr = $permissionUsr;
    }

    /**
     * @param mixed $statusUsr
     */
    public function setStatusUsr($statusUsr)
    {
        $this->statusUsr = $statusUsr;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    
    
}