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
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $Tipo_de_Usuario;

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
     * @ORM\Column(type="string")
     * @var string
     */
    private $passwdUsuario;

    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $biografia;


    /**
     * @ORM\Column(type="date", length=100)
     * @var \DateTime
     */
    private $fechaAlta;

    /**
     * @ORM\Column(type="date", length=100)
     * @var \DateTime
     */
    private $fechaActualizacion;


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
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $correoUsuario;

    /**
     * @return string
     */
    public function getTipoDeUsuario()
    {
        return $this->Tipo_de_Usuario;
    }

    /**
     * @param string $Tipo_de_Usuario
     */
    public function setTipoDeUsuario($Tipo_de_Usuario)
    {
        $this->Tipo_de_Usuario = $Tipo_de_Usuario;
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
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * @param \DateTime $fechaAlta
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    }

    /**
     * @return \DateTime
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    /**
     * @param \DateTime $fechaActualizacion
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;
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



    /**
    * Returns the roles granted to the user.
    *
    * <code>
    * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
    * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
    * is created.
     *
     * @return (Role|string)[] The user roles
    */
    public function getRoles()
    {
        $roles = ['ROLE_USER'];

        if ($this->getNivelUsuario()=='Administrador') {
            $roles[] = 'ROLE_ADMIN';
        }
        if ($this->getNivelUsuario()=='Usuario') {
            $roles[] = 'ROLE_USER';
        }
        return $roles;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getPasswdUsuario();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getNickUsuario();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials(){
    }
}
