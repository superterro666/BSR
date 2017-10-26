<?php

namespace EntityBundle\Entity;

/**
 * Ejercicio
 */
class Ejercicio
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
     * @var string
     */
    private $descripcion;


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
     * @return Ejercicio
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Ejercicio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $imagen;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagen = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add imagen
     *
     * @param \EntityBundle\Entity\Imagen $imagen
     *
     * @return Ejercicio
     */
    public function addImagen(\EntityBundle\Entity\Imagen $imagen)
    {
        $this->imagen[] = $imagen;

        return $this;
    }

    /**
     * Remove imagen
     *
     * @param \EntityBundle\Entity\Imagen $imagen
     */
    public function removeImagen(\EntityBundle\Entity\Imagen $imagen)
    {
        $this->imagen->removeElement($imagen);
    }

    /**
     * Get imagen
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagen()
    {
        return $this->imagen;
    }
    /**
     * @var \EntityBundle\Entity\Categoria
     */
    private $categoria;


    /**
     * Set categoria
     *
     * @param \EntityBundle\Entity\Categoria $categoria
     *
     * @return Ejercicio
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
