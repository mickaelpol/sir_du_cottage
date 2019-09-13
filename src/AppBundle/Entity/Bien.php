<?php

namespace AppBundle\Entity;

use AppBundle\Entity\ColorisParquet;
use AppBundle\Entity\SupplementParquet;
use AppBundle\Entity\SupplementTerrasse;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table(name="bien")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BienRepository")
 */
class Bien
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
     * @ORM\Column(name="Preparation_parquet", type="integer")
     */
    private $preparationParquet;

    /**
     * @var int
     *
     * @ORM\Column(name="Parquet_parquet", type="integer")
     */
    private $parquetParquet;

    /**
     * @var int
     *
     * @ORM\Column(name="Plinthe_parquet", type="integer")
     */
    private $plintheParquet;

    /**
     * @var int
     *
     * @ORM\Column(name="Acrylique_parquet", type="integer")
     */
    private $acryliqueParquet;

    /**
     * @var int
     *
     * @ORM\Column(name="Seuil_parquet", type="integer")
     */
    private $seuilParquet;

    /**
     * @var int
     *
     * @ORM\Column(name="Superficie_parquet", type="integer")
     */
    private $superficieParquet;

    /**
     * @var int
     *
     * @ORM\Column(name="Cadre_terrasse", type="integer")
     */
    private $cadreTerrasse;

    /**
     * @var int
     *
     * @ORM\Column(name="Platelage_terrasse", type="integer")
     */
    private $platelageTerrasse;

    /**
     * @var int
     *
     * @ORM\Column(name="Vissage_terrasse", type="integer")
     */
    private $vissageTerrasse;

    /**
     * @var int
     *
     * @ORM\Column(name="Superficie_terrasse", type="integer")
     */
    private $superficieTerrasse;

	/**
	 * Many biens have one Chantier. This is the owning side.
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chantier", inversedBy="biens")
	 * @ORM\JoinColumn(name="chantier_id", referencedColumnName="id")
	 */
	private $chantier;

	/**
	 * One Bien has many ColorisParquet. This is the inverse side.
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\ColorisParquet", mappedBy="bien", cascade={"persist", "remove"}, orphanRemoval=true)
	 */
	private $colorisParquets;

	/**
	 * One Bien has many SupplementParquet. This is the inverse side.
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\SupplementParquet", mappedBy="bien", cascade={"persist", "remove"}, orphanRemoval=true)
	 */
	private $supplementParquets;

	/**
	 * One Bien has many SupplementTerrasse. This is the inverse side.
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\SupplementTerrasse", mappedBy="bien", cascade={"persist", "remove"}, orphanRemoval=true)
	 */
	private $supplementTerrasses;

	public function __construct() {
		$this->colorisParquets = new ArrayCollection();
		$this->supplementParquets = new ArrayCollection();
		$this->supplementTerrasses = new ArrayCollection();
	}

	public function __toString()
	{
		return $this->nom;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Bien
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
     * Set preparationParquet
     *
     * @param integer $preparationParquet
     *
     * @return Bien
     */
    public function setPreparationParquet($preparationParquet)
    {
        $this->preparationParquet = $preparationParquet;

        return $this;
    }

    /**
     * Get preparationParquet
     *
     * @return int
     */
    public function getPreparationParquet()
    {
        return $this->preparationParquet;
    }

    /**
     * Set parquetParquet
     *
     * @param integer $parquetParquet
     *
     * @return Bien
     */
    public function setParquetParquet($parquetParquet)
    {
        $this->parquetParquet = $parquetParquet;

        return $this;
    }

    /**
     * Get parquetParquet
     *
     * @return int
     */
    public function getParquetParquet()
    {
        return $this->parquetParquet;
    }

    /**
     * Set plintheParquet
     *
     * @param integer $plintheParquet
     *
     * @return Bien
     */
    public function setPlintheParquet($plintheParquet)
    {
        $this->plintheParquet = $plintheParquet;

        return $this;
    }

    /**
     * Get plintheParquet
     *
     * @return int
     */
    public function getPlintheParquet()
    {
        return $this->plintheParquet;
    }

    /**
     * Set acryliqueParquet
     *
     * @param integer $acryliqueParquet
     *
     * @return Bien
     */
    public function setAcryliqueParquet($acryliqueParquet)
    {
        $this->acryliqueParquet = $acryliqueParquet;

        return $this;
    }

    /**
     * Get acryliqueParquet
     *
     * @return int
     */
    public function getAcryliqueParquet()
    {
        return $this->acryliqueParquet;
    }

    /**
     * Set seuilParquet
     *
     * @param integer $seuilParquet
     *
     * @return Bien
     */
    public function setSeuilParquet($seuilParquet)
    {
        $this->seuilParquet = $seuilParquet;

        return $this;
    }

    /**
     * Get seuilParquet
     *
     * @return int
     */
    public function getSeuilParquet()
    {
        return $this->seuilParquet;
    }

    /**
     * Set superficieParquet
     *
     * @param integer $superficieParquet
     *
     * @return Bien
     */
    public function setSuperficieParquet($superficieParquet)
    {
        $this->superficieParquet = $superficieParquet;

        return $this;
    }

    /**
     * Get superficieParquet
     *
     * @return int
     */
    public function getSuperficieParquet()
    {
        return $this->superficieParquet;
    }

    /**
     * Set cadreTerrasse
     *
     * @param integer $cadreTerrasse
     *
     * @return Bien
     */
    public function setCadreTerrasse($cadreTerrasse)
    {
        $this->cadreTerrasse = $cadreTerrasse;

        return $this;
    }

    /**
     * Get cadreTerrasse
     *
     * @return int
     */
    public function getCadreTerrasse()
    {
        return $this->cadreTerrasse;
    }

    /**
     * Set platelageTerrasse
     *
     * @param integer $platelageTerrasse
     *
     * @return Bien
     */
    public function setPlatelageTerrasse($platelageTerrasse)
    {
        $this->platelageTerrasse = $platelageTerrasse;

        return $this;
    }

    /**
     * Get platelageTerrasse
     *
     * @return int
     */
    public function getPlatelageTerrasse()
    {
        return $this->platelageTerrasse;
    }

    /**
     * Set vissageTerrasse
     *
     * @param integer $vissageTerrasse
     *
     * @return Bien
     */
    public function setVissageTerrasse($vissageTerrasse)
    {
        $this->vissageTerrasse = $vissageTerrasse;

        return $this;
    }

    /**
     * Get vissageTerrasse
     *
     * @return int
     */
    public function getVissageTerrasse()
    {
        return $this->vissageTerrasse;
    }

    /**
     * Set superficieTerrasse
     *
     * @param integer $superficieTerrasse
     *
     * @return Bien
     */
    public function setSuperficieTerrasse($superficieTerrasse)
    {
        $this->superficieTerrasse = $superficieTerrasse;

        return $this;
    }

    /**
     * Get superficieTerrasse
     *
     * @return int
     */
    public function getSuperficieTerrasse()
    {
        return $this->superficieTerrasse;
    }

	/**
	 * @return mixed
	 */
	public function getChantier()
	{
		return $this->chantier;
	}

	/**
	 * @param mixed $chantier
	 */
	public function setChantier($chantier)
	{
		$this->chantier = $chantier;
	}

    /**
     * Add colorisParquet
     *
     * @param ColorisParquet $colorisParquet
     *
     * @return Bien
     */
    public function addColorisParquet(ColorisParquet $colorisParquet)
    {
        $this->colorisParquets[] = $colorisParquet;
	    // *** This is what you are missing ***
	    $colorisParquet->setBien($this);
	    return $this;
    }

    /**
     * Remove colorisParquet
     *
     * @param ColorisParquet $colorisParquet
     */
    public function removeColorisParquet(ColorisParquet $colorisParquet)
    {
        $this->colorisParquets->removeElement($colorisParquet);
    }

    /**
     * Get colorisParquets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColorisParquets()
    {
        return $this->colorisParquets;
    }

    /**
     * Add supplementParquet
     *
     * @param SupplementParquet $supplementParquet
     *
     * @return Bien
     */
    public function addSupplementParquet(SupplementParquet $supplementParquet)
    {
        $this->supplementParquets[] = $supplementParquet;

        return $this;
    }

    /**
     * Remove supplementParquet
     *
     * @param SupplementParquet $supplementParquet
     */
    public function removeSupplementParquet(SupplementParquet $supplementParquet)
    {
        $this->supplementParquets->removeElement($supplementParquet);
    }

    /**
     * Get supplementParquets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSupplementParquets()
    {
        return $this->supplementParquets;
    }

    /**
     * Add supplementTerrass
     *
     * @param SupplementTerrasse $supplementTerrass
     *
     * @return Bien
     */
    public function addSupplementTerrass(SupplementTerrasse $supplementTerrass)
    {
        $this->supplementTerrasses[] = $supplementTerrass;

        return $this;
    }

    /**
     * Remove supplementTerrass
     *
     * @param SupplementTerrasse $supplementTerrass
     */
    public function removeSupplementTerrass(SupplementTerrasse $supplementTerrass)
    {
        $this->supplementTerrasses->removeElement($supplementTerrass);
    }

    /**
     * Get supplementTerrasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSupplementTerrasses()
    {
        return $this->supplementTerrasses;
    }
}
