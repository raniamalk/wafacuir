<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 02/11/2018
 * Time: 10:54
 */

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * class UserAdmin
 *
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user_admin")
 *
 **/
class UserAdmin extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     **/

    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

}