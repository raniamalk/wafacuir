<?php

namespace redemaroc\redeBundle\Entity;

use redemaroc\redeBundle\redeBundle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\Date;




/**
 * presentation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\presentationRepository")
 */
class presentation
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
     * @ORM\Column(name="titrep", type="string", length=255)
     */
    private $titrep;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text")
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="titreda", type="string", length=255)
     */
    private $titreda;

    /**
     * @var string
     *
     * @ORM\Column(name="domaineactivite", type="text")
     */
    private $domaineactivite;

    /**
     * @var string
     *
     * @ORM\Column(name="metadescription", type="text")
     */
    private $metadescription;

    /**
     * @var string
     *
     * @ORM\Column(name="metakeywords", type="text")
     */
    private $metakeywords;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="2M", mimeTypes = {"image/jpg", "image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage = "Merci d'envoyer un fichier au format .jpg ou .gif")
     */
    private $file;


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
     * Set titrep
     *
     * @param string $titrep
     * @return presentation
     */
    public function setTitrep($titrep)
    {
        $this->titrep = $titrep;

        return $this;
    }

    /**
     * Get titrep
     *
     * @return string 
     */
    public function getTitrep()
    {
        return $this->titrep;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return presentation
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set titreda
     *
     * @param string $titreda
     * @return presentation
     */
    public function setTitreda($titreda)
    {
        $this->titreda = $titreda;

        return $this;
    }

    /**
     * Get titreda
     *
     * @return string 
     */
    public function getTitreda()
    {
        return $this->titreda;
    }

    /**
     * Set domaineactivite
     *
     * @param string $domaineactivite
     * @return presentation
     */
    public function setDomaineactivite($domaineactivite)
    {
        $this->domaineactivite = $domaineactivite;

        return $this;
    }

    /**
     * Get domaineactivite
     *
     * @return string 
     */
    public function getDomaineactivite()
    {
        return $this->domaineactivite;
    }

    /**
     * @return string
     */
    public function getMetadescription()
    {
        return $this->metadescription;
    }

    /**
     * @param string $metadescription
     */
    public function setMetadescription($metadescription)
    {
        $this->metadescription = $metadescription;
    }

    /**
     * @return string
     */
    public function getMetakeywords()
    {
        return $this->metakeywords;
    }

    /**
     * @param string $metakeywords
     */
    public function setMetakeywords($metakeywords)
    {
        $this->metakeywords = $metakeywords;
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


    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/presentation';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }



}
