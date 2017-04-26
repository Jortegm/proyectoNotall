<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Notas")
 */
class Notas {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombreNotas;

    /**
     * @ORM\Column(type="string", length=10000)
     * @var string
     */
    private $imagenSVGNotas;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreNotas
     *
     * @param string $nombreNotas
     *
     * @return Notas
     */
    public function setNombreNotas($nombreNotas)
    {
        $this->nombreNotas = $nombreNotas;

        return $this;
    }

    /**
     * Get nombreNotas
     *
     * @return string
     */
    public function getNombreNotas()
    {
        return $this->nombreNotas;
    }

    /**
     * Set imagenSVGNotas
     *
     * @param string $imagenSVGNotas
     *
     * @return Notas
     */
    public function setImagenSVGNotas($imagenSVGNotas)
    {
        $this->imagenSVGNotas = $imagenSVGNotas;

        return $this;
    }

    /**
     * Get imagenSVGNotas
     *
     * @return string
     */
    public function getImagenSVGNotas()
    {
        return $this->imagenSVGNotas;
    }
}
