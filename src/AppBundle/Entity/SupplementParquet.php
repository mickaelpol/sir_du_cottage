<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Bien;
use Doctrine\ORM\Mapping as ORM;

/**
 * SupplementParquet
 *
 * @ORM\Table(name="supplement_parquet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SupplementParquetRepository")
 */
class SupplementParquet
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
	 * Many SupplementParquet have one Bien. This is the owning side.
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bien", inversedBy="supplementParquets")
	 * @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
	 */
	private $bien;


	public function __toString()
	{
		return $this->designation;
	}

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
     * @return SupplementParquet
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
     * @return SupplementParquet
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
     * @return SupplementParquet
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
