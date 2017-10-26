<?php

namespace EntityBundle\Entity;

/**
 * Categoria
 */
class Categoria
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * @var \EntityBundle\Entity\Tipo
     */
    private $tipo;


    /**
     * Set tipo
     *
     * @param \EntityBundle\Entity\Tipo $tipo
     *
     * @return Categoria
     */
    public function setTipo(\EntityBundle\Entity\Tipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \EntityBundle\Entity\Tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * @var \EntityBundle\Entity\Ejercicio
     */
    private $ejercicio;


    /**
     * Set ejercicio
     *
     * @param \EntityBundle\Entity\Ejercicio $ejercicio
     *
     * @return Categoria
     */
    public function setEjercicio(\EntityBundle\Entity\Ejercicio $ejercicio = null)
    {
        $this->ejercicio = $ejercicio;

        return $this;
    }

    /**
     * Get ejercicio
     *
     * @return \EntityBundle\Entity\Ejercicio
     */
    public function getEjercicio()
    {
        return $this->ejercicio;
    }
}
