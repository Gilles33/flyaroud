<?php

namespace WCS\CoavBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="WCS\CoavBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=32)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=32)
     */
    private $lastName;


    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=32)
     */
    private $phoneNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;


    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint", nullable=true)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="WCS\CoavBundle\Entity\Review", mappedBy="reviewAuthor")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reviews;

    /**
     * @var bool
     *
     * @ORM\Column(name="isACertifiedPilot", type="boolean")
     */
    private $isACertifiedPilot;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\ManyToMany(targetEntity="WCS\CoavBundle\Entity\Reservation", mappedBy="passengers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity="WCS\CoavBundle\Entity\Flight", mappedBy="pilot")
     * @ORM\JoinColumn(nullable=true)
     */
    private $affectations;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }


    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }



    /**
     * Set note
     *
     * @param integer $note
     *
     * @return User
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set reviews
     *
     * @param integer $reviews
     *
     * @return User
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * Get reviews
     *
     * @return int
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Set isACertifiedPilot
     *
     * @param boolean $isACertifiedPilot
     *
     * @return User
     */
    public function setIsACertifiedPilot($isACertifiedPilot)
    {
        $this->isACertifiedPilot = $isACertifiedPilot;

        return $this;
    }

    /**
     * Get isACertifiedPilot
     *
     * @return bool
     */
    public function getIsACertifiedPilot()
    {
        return $this->isACertifiedPilot;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
  

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->reservations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creationDate = new \DateTime();
    }

    public function __toString()
    {
        return $this->userName;
    }

    /**
     * Add reservation
     *
     * @param \WCS\CoavBundle\Entity\Reservation $reservation
     *
     * @return User
     */
    public function addReservation(\WCS\CoavBundle\Entity\Reservation $reservation)
    {
        $this->reservations[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \WCS\CoavBundle\Entity\Reservation $reservation
     */
    public function removeReservation(\WCS\CoavBundle\Entity\Reservation $reservation)
    {
        $this->reservations->removeElement($reservation);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Add affectation
     *
     * @param \WCS\CoavBundle\Entity\Flight $affectation
     *
     * @return User
     */
    public function addAffectation(\WCS\CoavBundle\Entity\Flight $affectation)
    {
        $this->affectations[] = $affectation;

        return $this;
    }

    /**
     * Remove affectation
     *
     * @param \WCS\CoavBundle\Entity\Flight $affectation
     */
    public function removeAffectation(\WCS\CoavBundle\Entity\Flight $affectation)
    {
        $this->affectations->removeElement($affectation);
    }

    /**
     * Get affectations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAffectations()
    {
        return $this->affectations;
    }

    /**
     * Add review
     *
     * @param \WCS\CoavBundle\Entity\Review $review
     *
     * @return User
     */
    public function addReview(\WCS\CoavBundle\Entity\Review $review)
    {
        $this->reviews[] = $review;

        return $this;
    }

    /**
     * Remove review
     *
     * @param \WCS\CoavBundle\Entity\Review $review
     */
    public function removeReview(\WCS\CoavBundle\Entity\Review $review)
    {
        $this->reviews->removeElement($review);
    }
}
