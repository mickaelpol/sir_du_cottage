<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Chantier;
use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireChantier
 *
 * @ORM\Table(name="commentaire_chantier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentaireChantierRepository")
 */
class CommentaireChantier
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
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

	/**
	 * Plusieurs commentaire peuvent appartenir à un chantier.
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chantier", inversedBy="commentaires")
	 * @ORM\JoinColumn(name="chantier_id", referencedColumnName="id")
	 */
	private $chantier;

	public function __toString()
	{
		return $this->commentaire;
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return CommentaireChantier
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set chantier
     *
     * @param Chantier $chantier
     *
     * @return CommentaireChantier
     */
    public function setChantier(Chantier $chantier = null)
    {
        $this->chantier = $chantier;

        return $this;
    }

    /**
     * Get chantier
     *
     * @return Chantier
     */
    public function getChantier()
    {
        return $this->chantier;
    }
}
