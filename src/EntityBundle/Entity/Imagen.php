<?php

namespace EntityBundle\Entity;

/**
 * Imagen
 */
class Imagen
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;


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
     * Set url
     *
     * @param string $url
     *
     * @return Imagen
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
     * @return Imagen
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
