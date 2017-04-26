<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Usuarios")
 */
class Usuarios {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $nombreUsuario;

    /**
     * @ORM\Column(type="string", length=200)
     * @var string
     */
    private $apellidoUsuario;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $correoUsuario;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $nivelUsuario;

    /**
     * @ORM\Column(type="string", length=80)
     * @var string
     */
    private $Pais;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $nickUsuario;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $passwdUsuario;

    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $biografia;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Partitura", mappedBy="PartituraUsuario")
     * @var Partitura
     * @ORM\JoinColumn(nullable=false)
    */
    private $UsuarioPartitura;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->UsuarioPartitura = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     *
     * @return Usuarios
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set apellidoUsuario
     *
     * @param string $apellidoUsuario
     *
     * @return Usuarios
     */
    public function setApellidoUsuario($apellidoUsuario)
    {
        $this->apellidoUsuario = $apellidoUsuario;

        return $this;
    }

    /**
     * Get apellidoUsuario
     *
     * @return string
     */
    public function getApellidoUsuario()
    {
        return $this->apellidoUsuario;
    }

    /**
     * Set correoUsuario
     *
     * @param string $correoUsuario
     *
     * @return Usuarios
     */
    public function setCorreoUsuario($correoUsuario)
    {
        $this->correoUsuario = $correoUsuario;

        return $this;
    }

    /**
     * Get correoUsuario
     *
     * @return string
     */
    public function getCorreoUsuario()
    {
        return $this->correoUsuario;
    }

    /**
     * Set nivelUsuario
     *
     * @param string $nivelUsuario
     *
     * @return Usuarios
     */
    public function setNivelUsuario($nivelUsuario)
    {
        $this->nivelUsuario = $nivelUsuario;

        return $this;
    }

    /**
     * Get nivelUsuario
     *
     * @return string
     */
    public function getNivelUsuario()
    {
        return $this->nivelUsuario;
    }

    /**
     * Set pais
     *
     * @param string $pais
     *
     * @return Usuarios
     */
    public function setPais($pais)
    {
        $this->Pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->Pais;
    }

    /**
     * Set nickUsuario
     *
     * @param string $nickUsuario
     *
     * @return Usuarios
     */
    public function setNickUsuario($nickUsuario)
    {
        $this->nickUsuario = $nickUsuario;

        return $this;
    }

    /**
     * Get nickUsuario
     *
     * @return string
     */
    public function getNickUsuario()
    {
        return $this->nickUsuario;
    }

    /**
     * Set passwdUsuario
     *
     * @param string $passwdUsuario
     *
     * @return Usuarios
     */
    public function setPasswdUsuario($passwdUsuario)
    {
        $this->passwdUsuario = $passwdUsuario;

        return $this;
    }

    /**
     * Get passwdUsuario
     *
     * @return string
     */
    public function getPasswdUsuario()
    {
        return $this->passwdUsuario;
    }

    /**
     * Set biografia
     *
     * @param string $biografia
     *
     * @return Usuarios
     */
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;

        return $this;
    }

    /**
     * Get biografia
     *
     * @return string
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Add usuarioPartitura
     *
     * @param \AppBundle\Entity\Partitura $usuarioPartitura
     *
     * @return Usuarios
     */
    public function addUsuarioPartitura(\AppBundle\Entity\Partitura $usuarioPartitura)
    {
        $this->UsuarioPartitura[] = $usuarioPartitura;

        return $this;
    }

    /**
     * Remove usuarioPartitura
     *
     * @param \AppBundle\Entity\Partitura $usuarioPartitura
     */
    public function removeUsuarioPartitura(\AppBundle\Entity\Partitura $usuarioPartitura)
    {
        $this->UsuarioPartitura->removeElement($usuarioPartitura);
    }

    /**
     * Get usuarioPartitura
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarioPartitura()
    {
        return $this->UsuarioPartitura;
    }
}
