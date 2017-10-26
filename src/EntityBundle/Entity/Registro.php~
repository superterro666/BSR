<?php

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * Registro
 */
class Registro implements UserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $sha;

    /**
     * @var \DateTime
     */
    private $fechaRegistro;

    /**
     * @var string
     */
    private $role;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Registro
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Registro
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set sha
     *
     * @param string $sha
     *
     * @return Registro
     */
    public function setSha($sha)
    {
        $this->sha = $sha;

        return $this;
    }

    /**
     * Get sha
     *
     * @return string
     */
    public function getSha()
    {
        return $this->sha;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return Registro
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Registro
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return $this->getRole();
    }

    public function getSalt() {
        return null;
    }

    public function getUsername(): string {
        return $this->getUser();
    }

    /**
     * @var boolean
     */
    private $estado;


    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Registro
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @var string
     */
    private $status_code;

    /**
     * @var \DateTime
     */
    private $activate_date;


    /**
     * Set statusCode
     *
     * @param string $statusCode
     *
     * @return Registro
     */
    public function setStatusCode($statusCode)
    {
        $this->status_code = $statusCode;

        return $this;
    }

    /**
     * Get statusCode
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Set activateDate
     *
     * @param \DateTime $activateDate
     *
     * @return Registro
     */
    public function setActivateDate($activateDate)
    {
        $this->activate_date = $activateDate;

        return $this;
    }

    /**
     * Get activateDate
     *
     * @return \DateTime
     */
    public function getActivateDate()
    {
        return $this->activate_date;
    }
}
