<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Bien;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chantier
 *
 * @ORM\Table(name="chantier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChantierRepository")
 */
class Chantier
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="Nombre_biens", type="integer")
     */
    private $nombreBiens;

	/**
	 * One Chantier has many Bien. This is the inverse side.
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bien", mappedBy="chantier")
	 */
	private $biens;

	public function __construct() {
		$this->biens = new ArrayCollection();
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
     * @return Chantier
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Chantier
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Chantier
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nombreBiens
     *
     * @param integer $nombreBiens
     *
     * @return Chantier
     */
    public function setNombreBiens($nombreBiens)
    {
        $this->nombreBiens = $nombreBiens;

        return $this;
    }

    /**
     * Get nombreBiens
     *
     * @return int
     */
    public function getNombreBiens()
    {
        return $this->nombreBiens;
    }

	/**
	 * @return mixed
	 */
	public function getBiens()
	{
		return $this->biens;
	}

	/**
	 * @param mixed $biens
	 */
	public function setBiens($biens)
	{
		$this->biens = $biens;
	}

    /**
     * Add bien
     *
     * @param Bien $bien
     *
     * @return Chantier
     */
    public function addBien(Bien $bien)
    {
        $this->biens[] = $bien;

        return $this;
    }

    /**
     * Remove bien
     *
     * @param Bien $bien
     */
    public function removeBien(Bien $bien)
    {
        $this->biens->removeElement($bien);
    }
}
