<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DataUser
 *
 * @ORM\Table(name="data_user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\DataUserRepository")
 */
class DataUser
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
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="idteam", type="integer", nullable=true)
     */
    private $idteam;

    /**
     * @var int
     *
     * @ORM\Column(name="scoreuser", type="integer", nullable=true)
     */
    private $scoreuser;


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
     * Set iduser
     *
     * @param integer $iduser
     * @return DataUser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return DataUser
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set idteam
     *
     * @param integer $idteam
     * @return DataUser
     */
    public function setIdteam($idteam)
    {
        $this->idteam = $idteam;

        return $this;
    }

    /**
     * Get idteam
     *
     * @return integer 
     */
    public function getIdteam()
    {
        return $this->idteam;
    }

    /**
     * Set scoreuser
     *
     * @param integer $scoreuser
     * @return DataUser
     */
    public function setScoreuser($scoreuser)
    {
        $this->scoreuser = $scoreuser;

        return $this;
    }

    /**
     * Get scoreuser
     *
     * @return integer 
     */
    public function getScoreuser()
    {
        return $this->scoreuser;
    }
}
