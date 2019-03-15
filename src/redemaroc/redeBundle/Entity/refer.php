<?php

namespace redemaroc\redeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * refer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="redemaroc\redeBundle\Entity\referRepository")
 */
class refer
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
     * @ORM\Column(name="ou", type="string", length=255)
     */
    private $ou;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="quoi", type="string", length=255)
     */
    private $quoi;

    /**
     * @var string
     *
     * @ORM\Column(name="realisation", type="text")
     */
    private $realisation;



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
     * Set quoi
     *
     * @param string $quoi
     * @return refer
     */
    public function setQuoi($quoi)
    {
        $this->quoi = $quoi;

        return $this;
    }

    /**
     * Get quoi
     *
     * @return string 
     */
    public function getQuoi()
    {
        return $this->quoi;
    }

    /**
     * Set ou
     *
     * @param string $ou
     * @return refer
     */
    public function setOu($ou)
    {
        $this->ou = $ou;

        return $this;
    }

    /**
     * Get ou
     *
     * @return string 
     */
    public function getOu()
    {
        return $this->ou;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getRealisation()
    {
        return $this->realisation;
    }

    /**
     * @param string $realisation
     */
    public function setRealisation($realisation)
    {
        $this->realisation = $realisation;
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
        return 'uploads/references';
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
        return 'uploads/ref1';
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
        return 'uploads/ref2';
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
        return 'uploads/ref3';
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
        return 'uploads/ref4';
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
        return 'uploads/refdoc';
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
