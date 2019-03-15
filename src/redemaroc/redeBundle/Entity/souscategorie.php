<?php

namespace redemaroc\redeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * souscategorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\souscategorieRepository")
 */
class souscategorie
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
     * @ORM\Column(name="souscategorie", type="string", length=255)
     */
    private $souscategorie;


    /**
     * @var type
     *
     *
     *
     * @ORM\ManyToOne( targetEntity="type", inversedBy="souscategorie", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", onDelete="CASCADE")
     *
     *
     */
    private $type;

    /**
     * @var string
     *
     *
     * @ORM\OneToMany(targetEntity="produit",mappedBy="souscategorie")
     * @ORM\JoinColumn( onDelete="CASCADE")
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
     * @return type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param string $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return string
     */
    public function getSouscategorie()
    {
        return $this->souscategorie;
    }

    /**
     * @param string $souscategorie
     */
    public function setSouscategorie($souscategorie)
    {
        $this->souscategorie = $souscategorie;
    }

}
