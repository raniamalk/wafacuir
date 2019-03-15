<?php

namespace redemaroc\redeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * home
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\homeRepository")
 */
class home
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
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="titresuite", type="string", length=150)
     */
    private $titresuite;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="val1", type="string", length=30)
     */
    private $val1;

    /**
     * @var string
     *
     * @ORM\Column(name="texte1", type="string", length=100)
     */
    private $texte1;

    /**
     * @var string
     *
     * @ORM\Column(name="val2", type="string", length=30)
     */
    private $val2;

    /**
     * @var string
     *
     * @ORM\Column(name="texte2", type="string", length=100)
     */
    private $texte2;

    /**
     * @var string
     *
     * @ORM\Column(name="val3", type="string", length=30)
     */
    private $val3;

    /**
     * @var string
     *
     * @ORM\Column(name="texte3", type="string", length=100)
     */
    private $texte3;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=100)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=100)
     */
    private $linkedin;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=200)
     */
    private $youtube;


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
     * Set titre
     *
     * @param string $titre
     * @return home
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set titresuite
     *
     * @param string $titresuite
     * @return home
     */
    public function setTitresuite($titresuite)
    {
        $this->titresuite = $titresuite;

        return $this;
    }

    /**
     * Get titresuite
     *
     * @return string 
     */
    public function getTitresuite()
    {
        return $this->titresuite;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return home
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set val1
     *
     * @param string $val1
     * @return home
     */
    public function setVal1($val1)
    {
        $this->val1 = $val1;

        return $this;
    }

    /**
     * Get val1
     *
     * @return string 
     */
    public function getVal1()
    {
        return $this->val1;
    }

    /**
     * Set texte1
     *
     * @param string $texte1
     * @return home
     */
    public function setTexte1($texte1)
    {
        $this->texte1 = $texte1;

        return $this;
    }

    /**
     * Get texte1
     *
     * @return string 
     */
    public function getTexte1()
    {
        return $this->texte1;
    }

    /**
     * Set val2
     *
     * @param string $val2
     * @return home
     */
    public function setVal2($val2)
    {
        $this->val2 = $val2;

        return $this;
    }

    /**
     * Get val2
     *
     * @return string 
     */
    public function getVal2()
    {
        return $this->val2;
    }

    /**
     * Set texte2
     *
     * @param string $texte2
     * @return home
     */
    public function setTexte2($texte2)
    {
        $this->texte2 = $texte2;

        return $this;
    }

    /**
     * Get texte2
     *
     * @return string 
     */
    public function getTexte2()
    {
        return $this->texte2;
    }

    /**
     * Set val3
     *
     * @param string $val3
     * @return home
     */
    public function setVal3($val3)
    {
        $this->val3 = $val3;

        return $this;
    }

    /**
     * Get val3
     *
     * @return string 
     */
    public function getVal3()
    {
        return $this->val3;
    }

    /**
     * Set texte3
     *
     * @param string $texte3
     * @return home
     */
    public function setTexte3($texte3)
    {
        $this->texte3 = $texte3;

        return $this;
    }

    /**
     * Get texte3
     *
     * @return string 
     */
    public function getTexte3()
    {
        return $this->texte3;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return home
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     * @return home
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string 
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     * @return home
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string 
     */
    public function getYoutube()
    {
        return $this->youtube;
    }
}
