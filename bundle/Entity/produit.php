<?php

namespace redemaroc\redeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\produitRepository")
 */
class produit
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
     * @var type
     *
     *
     *
     * @ORM\ManyToOne( targetEntity="type", inversedBy="produit", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", onDelete="CASCADE")
     *
     *
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="titre1", type="string", length=255, nullable=true)
     */
    private $titre1;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text", nullable=true)
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="titre2", type="string", length=255, nullable=true)
     */
    private $titre2;

    /**
     * @var string
     *
     * @ORM\Column(name="plusinfo", type="text", nullable=true)
     */
    private $plusinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255, nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\Column(name="accessoire", type="string", length=255, nullable=true)
     */
    private $accessoire;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $patha;

    /**
     * @Assert\File(maxSize="2M", mimeTypes = {"image/jpg", "image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage = "Merci d'envoyer un fichier au format .jpg ou .gif")
     */
    private $filea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $pathb;

    /**
     * @Assert\File(maxSize="2M", mimeTypes = {"image/jpg", "image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage = "Merci d'envoyer un fichier au format .jpg ou .gif")
     */
    private $fileb;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $pathc;

    /**
     * @Assert\File(maxSize="2M", mimeTypes = {"image/jpg", "image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage = "Merci d'envoyer un fichier au format .jpg ou .gif")
     */
    private $filec;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $pathd;

    /**
     * @Assert\File(maxSize="2M", mimeTypes = {"image/jpg", "image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage = "Merci d'envoyer un fichier au format .jpg ou .gif")
     */
    private $filed;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $pathe;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $filee;




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
     * @return produit
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
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
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return produit
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
     * @return string
     */
    public function getTitre1()
    {
        return $this->titre1;
    }

    /**
     * @param string $titre1
     */
    public function setTitre1($titre1)
    {
        $this->titre1 = $titre1;
    }


    /**
     * @return string
     */
    public function getTitre2()
    {
        return $this->titre2;
    }

    /**
     * @param string $titre2
     */
    public function setTitre2($titre2)
    {
        $this->titre2 = $titre2;
    }

    /**
     * @return string
     */
    public function getPlusinfo()
    {
        return $this->plusinfo;
    }

    /**
     * @param string $plusinfo
     */
    public function setPlusinfo($plusinfo)
    {
        $this->plusinfo = $plusinfo;
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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param string $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return string
     */
    public function getAccessoire()
    {
        return $this->accessoire;
    }

    /**
     * @param string $accessoire
     */
    public function setAccessoire($accessoire)
    {
        $this->accessoire = $accessoire;
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




    /* Image principale*/

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
        return 'uploads/produitPrincipale';
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


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
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



    /* Image 1 */



    public function getAbsolutePatha()
    {
        return null === $this->patha
            ? null
            : $this->getUploadRootDira().'/'.$this->patha;
    }

    public function getWebPatha()
    {
        return null === $this->patha
            ? null
            : $this->getUploadDir().'/'.$this->patha;
    }

    protected function getUploadRootDira()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDira();
    }

    protected function getUploadDira()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/produit1';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFilea(UploadedFile $filea = null)
    {
        $this->filea = $filea;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFilea()
    {
        return $this->filea;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploada()
    {
        if (null !== $this->getFilea()) {
            // do whatever you want to generate a unique name
            $filenamea = sha1(uniqid(mt_rand(), true));
            $this->patha = $filenamea.'.'.$this->getFilea()->guessExtension();
        }
    }


    public function uploada()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFilea()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFilea()->move(
            $this->getUploadRootDira(),
            $this->getFilea()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->patha = $this->getFilea()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->filea = null;
    }



    /* Image 2 */





    public function getAbsolutePathb()
    {
        return null === $this->pathb
            ? null
            : $this->getUploadRootDirb().'/'.$this->pathb;
    }

    public function getWebPathb()
    {
        return null === $this->pathb
            ? null
            : $this->getUploadDir().'/'.$this->pathb;
    }

    protected function getUploadRootDirb()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDirb();
    }

    protected function getUploadDirb()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/produit2';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileb(UploadedFile $fileb = null)
    {
        $this->fileb = $fileb;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileb()
    {
        return $this->fileb;
    }


    public function uploadb()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileb()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFileb()->move(
            $this->getUploadRootDirb(),
            $this->getFileb()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->pathb = $this->getFileb()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->fileb = null;
    }




    /* Image 3 */




    public function getAbsolutePathc()
    {
        return null === $this->pathc
            ? null
            : $this->getUploadRootDirc().'/'.$this->pathc;
    }

    public function getWebPathc()
    {
        return null === $this->pathc
            ? null
            : $this->getUploadDir().'/'.$this->pathc;
    }

    protected function getUploadRootDirc()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDirc();
    }

    protected function getUploadDirc()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/produit3';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFilec(UploadedFile $filec = null)
    {
        $this->filec = $filec;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFilec()
    {
        return $this->filec;
    }


    public function uploadc()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFilec()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFilec()->move(
            $this->getUploadRootDirc(),
            $this->getFilec()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->pathc = $this->getFilec()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->filec = null;
    }



    /* Image 4 */




    public function getAbsolutePathd()
    {
        return null === $this->pathd
            ? null
            : $this->getUploadRootDird().'/'.$this->pathd;
    }

    public function getWebPathd()
    {
        return null === $this->pathd
            ? null
            : $this->getUploadDir().'/'.$this->pathd;
    }

    protected function getUploadRootDird()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDird();
    }

    protected function getUploadDird()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/produit4';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFiled(UploadedFile $filed = null)
    {
        $this->filed = $filed;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFiled()
    {
        return $this->filed;
    }


    public function uploadd()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFiled()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFiled()->move(
            $this->getUploadRootDird(),
            $this->getFiled()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->pathd = $this->getFiled()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->filed = null;
    }


    /* Document */




    public function getAbsolutePathe()
    {
        return null === $this->pathe
            ? null
            : $this->getUploadRootDire().'/'.$this->pathe;
    }

    public function getWebPathe()
    {
        return null === $this->pathe
            ? null
            : $this->getUploadDir().'/'.$this->pathe;
    }

    protected function getUploadRootDire()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDire();
    }

    protected function getUploadDire()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/produitdoc';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFilee(UploadedFile $filee = null)
    {
        $this->filee = $filee;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFilee()
    {
        return $this->filee;
    }


    public function uploade()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFilee()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFilee()->move(
            $this->getUploadRootDire(),
            $this->getFilee()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->pathe = $this->getFilee()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->filee = null;
    }


}


