<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity
 */
class Departamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var \AppBundle\Entity\Pais
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pais", inversedBy="departamentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paisdept_id", referencedColumnName="id")
     * })
     */
    private $paisdept;


    function __toString()
    {
        return (string) $this->nombre;
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Departamento
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
     * Set paisdept
     *
     * @param \AppBundle\Entity\Pais $paisdept
     *
     * @return Departamento
     */
    public function setPaisdept(\AppBundle\Entity\Pais $paisdept = null)
    {
        $this->paisdept = $paisdept;

        return $this;
    }

    /**
     * Get paisdept
     *
     * @return \AppBundle\Entity\Pais
     */
    public function getPaisdept()
    {
        return $this->paisdept;
    }
}

