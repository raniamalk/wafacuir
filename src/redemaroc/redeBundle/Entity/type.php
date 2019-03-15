<?php

namespace redemaroc\redeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * type
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\typeRepository")
 */
class type
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


    /**
     * @var menu
     *
     *
     *
     * @ORM\ManyToOne( targetEntity="menu", inversedBy="type", cascade={"persist"})
     * @ORM\JoinColumn(name="menu_id", referencedColumnName="id", onDelete="CASCADE")
     *
     *
     */
    private $menu;


    /**
     * @var string
     *
     *
     * @ORM\OneToMany(targetEntity="souscategorie",mappedBy="type")
     * @ORM\JoinColumn( onDelete="CASCADE")
     *
     */
    private $souscategorie;


//    /**
//     * @var string
//     *
//     *
//     * @ORM\OneToMany(targetEntity="produit",mappedBy="type")
//     * @ORM\JoinColumn( onDelete="CASCADE")
//     *
//     */
//    private $produit;


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
     * Set type
     *
     * @param string $type
     * @return type
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
     * @return menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param menu $menu
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
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
