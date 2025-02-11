<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Bien;
use Doctrine\ORM\Mapping as ORM;

/**
 * ColorisParquet
 *
 * @ORM\Table(name="coloris_parquet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ColorisParquetRepository")
 */
class ColorisParquet
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
     * @ORM\Column(name="Nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="Code_couleur", type="integer")
     */
    private $codeCouleur;

	/**
	 * Many ColorisParquet have one Bien. This is the owning side.
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bien", inversedBy="colorisParquets", cascade={"persist"}))
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
     * Set nom
     *
     * @param string $nom
     *
     * @return ColorisParquet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set codeCouleur
     *
     * @param integer $codeCouleur
     *
     * @return ColorisParquet
     */
    public function setCodeCouleur($codeCouleur)
    {
        $this->codeCouleur = $codeCouleur;

        return $this;
    }

    /**
     * Get codeCouleur
     *
     * @return int
     */
    public function getCodeCouleur()
    {
        return $this->codeCouleur;
    }

    /**
     * Set bien
     *
     * @param Bien $bien
     *
     * @return ColorisParquet
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
