<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio")
 * @ORM\Entity
 */
class Municipio
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var \AppBundle\Entity\Departamento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Departamento", inversedBy="municipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="deptmuni_id", referencedColumnName="id")
     * })
     */
    private $deptmuni;


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
     * @return Municipio
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
     * Set deptmuni
     *
     * @param \AppBundle\Entity\Departamento $deptmuni
     *
     * @return Municipio
     */
    public function setDeptmuni(\AppBundle\Entity\Departamento $deptmuni = null)
    {
        $this->deptmuni = $deptmuni;

        return $this;
    }

    /**
     * Get deptmuni
     *
     * @return \AppBundle\Entity\Departamento
     */
    public function getDeptmuni()
    {
        return $this->deptmuni;
    }

    
    private $pais;

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */ 
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }
}

