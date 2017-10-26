<?php

namespace EntityBundle\Entity;

/**
 * Tipo
 */
class Tipo
{
    /**
     * @var int
     */
    private $id;


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
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $length;

    /**
     * @var \EntityBundle\Entity\Categoria
     */
    private $categoria;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Tipo
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
     * Set type
     *
     * @param string $type
     *
     * @return Tipo
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set length
     *
     * @param string $length
     *
     * @return Tipo
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set categoria
     *
     * @param \EntityBundle\Entity\Categoria $categoria
     *
     * @return Tipo
     */
    public function setCategoria(\EntityBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \EntityBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}
