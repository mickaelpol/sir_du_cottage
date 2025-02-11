<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Bien;
use Doctrine\ORM\Mapping as ORM;

/**
 * SupplementTerrasse
 *
 * @ORM\Table(name="supplement_terrasse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SupplementTerrasseRepository")
 */
class SupplementTerrasse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="Etat", type="integer")
     */
    private $etat;

	/**
	 * Many SupplementTerrasse have one Bien. This is the owning side.
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bien", inversedBy="supplementTerrasses")
	 * @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
	 */
	private $bien;


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
     * Set designation
     *
     * @param string $designation
     *
     * @return SupplementTerrasse
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return SupplementTerrasse
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set bien
     *
     * @param Bien $bien
     *
     * @return SupplementTerrasse
     */
    public function setBien(Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return Bien
     */
    public function getBien()
    {
        return $this->bien;
    }
}
