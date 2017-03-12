<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ordering
 *
 * @ORM\Table(name="ordering", indexes={@ORM\Index(name="created_at", columns={"created_at"})})
 * @ORM\Entity
 */
class Ordering
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(name="owner_name", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     * message = 'Обязательно для заполнения'
     */
    private $ownerName;

    /**
     * @var string
     * @ORM\Column(name="phone", type="string", length=15, nullable=false)
     * @Assert\NotBlank()
     * message = 'Обязательно для заполнения'
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", length=255, nullable=false)
     */
    private $notes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="completed", type="boolean", nullable=false)
     */
    private $completed;


    public function __construct()
    {
        $this->createdAt = time();
    }

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
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return Ordering
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return integer
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set ownerName
     *
     * @param string $ownerName
     *
     * @return Ordering
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    /**
     * Get ownerName
     *
     * @return string
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Ordering
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Ordering
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set completed
     *
     * @param boolean $completed
     *
     * @return Ordering
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean
     */
    public function getCompleted()
    {
        return $this->completed;
    }
}