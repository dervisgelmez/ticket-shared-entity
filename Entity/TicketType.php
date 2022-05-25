<?php

namespace Ticket\EntityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity()
 * @ORM\Table(name="p_ticket_type")
 */
class TicketType
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"rest"})
     */
    private $name;

    /**
     * @var TicketSubType[]|array
     * @ORM\OneToMany(targetEntity="Ticket\EntityBundle\Entity\TicketSubType", mappedBy="ticketType")
     */
    private $ticketSubTypes;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dependency;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    public function __construct()
    {
        $this->ticketSubTypes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array|TicketSubType[]
     */
    public function getTicketSubTypes()
    {
        return $this->ticketSubTypes;
    }

    /**
     * @param array|TicketSubType[] $ticketSubTypes
     */
    public function setTicketSubTypes($ticketSubTypes): void
    {
        $this->ticketSubTypes = $ticketSubTypes;
    }

    /**
     * @return string|null
     */
    public function getDependency(): ?string
    {
        return $this->dependency;
    }

    /**
     * @param string|null $dependency
     */
    public function setDependency(?string $dependency): void
    {
        $this->dependency = $dependency;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime|null $deletedAt
     */
    public function setDeletedAt(?\DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @param TicketSubType $ticketSubType
     * @return void
     */
    public function addTicketSubType(TicketSubType $ticketSubType)
    {
        if (!$this->ticketSubTypes->contains($ticketSubType)) {
            $this->ticketSubTypes[] = $ticketSubType;
            $ticketSubType->setTicketType($this);
        }
    }

    /**
     * @param TicketSubType $ticketSubType
     * @return void
     */
    public function removeTicketSubType(TicketSubType $ticketSubType)
    {
        if ($this->ticketSubTypes->removeElement($ticketSubType)) {
            if ($ticketSubType->getTicketType()->getId() === $this->getId()) {
                $ticketSubType->setTicketType(null);
            }
        }
    }
}