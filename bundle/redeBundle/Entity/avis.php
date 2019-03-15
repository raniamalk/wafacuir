<?php

namespace redemaroc\redeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * avis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\avisRepository")
 */
class avis
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="avis", type="text")
     */
    private $avis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     *
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateddAt", type="datetime", nullable=true)
     *
     */
    private $updateddAt;

    /**
     * @var \boolean
     *
     * @ORM\Column(name=" publish ", type="boolean", nullable=true)
     *
     */
    private $publish;

    /**
     * @var produit
     *
     * 
     *
     * @ORM\ManyToOne(targetEntity="redemaroc\redeBundle\Entity\produit", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     *
     *
     */
    private $produit;


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
     * Set nom
     *
     * @param string $nom
     * @return avis
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
     * Set email
     *
     * @param string $email
     * @return avis
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set avis
     *
     * @param string $avis
     * @return avis
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return string
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateddAt()
    {
        return $this->updateddAt;
    }

    /**
     * @param \DateTime $updateddAt
     */
    public function setUpdateddAt($updateddAt)
    {
        $this->updateddAt = $updateddAt;
    }

    /**
     * @return bool
     */
    public function isPublish()
    {
        return $this->publish;
    }

    /**
     * @param bool $publish
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;
    }

  



    /**
     * Get publish
     *
     * @return boolean 
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * @return produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param produit $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }


}
