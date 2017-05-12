<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Partitura")
 */
class Partitura {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string

     */
    private $NombrePartitura;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $ContenidoPartitura;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuarios", inversedBy="UsuarioPartitura")
     * @var Usuarios
     * @ORM\JoinColumn(nullable=false)
     */
    private $PartituraUsuario;


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
     * Set nombrePartitura
     *
     * @param string $nombrePartitura
     *
     * @return Partitura
     */
    public function setNombrePartitura($nombrePartitura)
    {
        $this->NombrePartitura = $nombrePartitura;

        return $this;
    }

    /**
     * Get nombrePartitura
     *
     * @return string
     */
    public function getNombrePartitura()
    {
        return $this->NombrePartitura;
    }

    /**
     * Set contenidoPartitura
     *
     * @param string $contenidoPartitura
     *
     * @return Partitura
     */
    public function setContenidoPartitura($contenidoPartitura)
    {
        $this->ContenidoPartitura = $contenidoPartitura;

        return $this;
    }

    /**
     * Get contenidoPartitura
     *
     * @return string
     */
    public function getContenidoPartitura()
    {
        return $this->ContenidoPartitura;
    }

    /**
     * Set partituraUsuario
     *
     * @param \AppBundle\Entity\Usuarios $partituraUsuario
     *
     * @return Partitura
     */
    public function setPartituraUsuario(\AppBundle\Entity\Usuarios $partituraUsuario)
    {
        $this->PartituraUsuario = $partituraUsuario;

        return $this;
    }

    /**
     * Get partituraUsuario
     *
     * @return \AppBundle\Entity\Usuarios
     */
    public function getPartituraUsuario()
    {
        return $this->PartituraUsuario;
    }
}
