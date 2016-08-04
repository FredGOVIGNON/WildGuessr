<?php

namespace PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checkpoint
 *
 * @ORM\Table(name="checkpoint")
 * @ORM\Entity(repositoryClass="PlaceBundle\Repository\CheckpointRepository")
 */
class Checkpoint
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
     * @ORM\Column(name="idplace", type="integer")
     */
    private $idplace;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer")
     */
    private $iduser;

    /**
     * @var bool
     *
     * @ORM\Column(name="isonit", type="boolean", nullable=true)
     */
    private $isonit;

    /**
     * @var bool
     *
     * @ORM\Column(name="isnamed", type="boolean", nullable=true)
     */
    private $isnamed;

    /**
     * @var int
     *
     * @ORM\Column(name="scored", type="integer", nullable=true)
     */
    private $scored;


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
     * Set idplace
     *
     * @param integer $idplace
     * @return Checkpoint
     */
    public function setIdplace($idplace)
    {
        $this->idplace = $idplace;

        return $this;
    }

    /**
     * Get idplace
     *
     * @return integer 
     */
    public function getIdplace()
    {
        return $this->idplace;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return Checkpoint
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
     * Set isonit
     *
     * @param boolean $isonit
     * @return Checkpoint
     */
    public function setIsonit($isonit)
    {
        $this->isonit = $isonit;

        return $this;
    }

    /**
     * Get isonit
     *
     * @return boolean 
     */
    public function getIsonit()
    {
        return $this->isonit;
    }

    /**
     * Set isnamed
     *
     * @param boolean $isnamed
     * @return Checkpoint
     */
    public function setIsnamed($isnamed)
    {
        $this->isnamed = $isnamed;

        return $this;
    }

    /**
     * Get isnamed
     *
     * @return boolean 
     */
    public function getIsnamed()
    {
        return $this->isnamed;
    }

    /**
     * Set scored
     *
     * @param integer $scored
     * @return Checkpoint
     */
    public function setScored($scored)
    {
        $this->scored = $scored;

        return $this;
    }

    /**
     * Get scored
     *
     * @return integer 
     */
    public function getScored()
    {
        return $this->scored;
    }
}
