<?php

namespace Ticket\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 * @ORM\Table(name="p_ticket")
 */
class Ticket
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"rest"})
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"rest"})
     */
    private $state;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"rest"})
     */
    private $transition;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $lastStateUpdatedBy;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entity;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Groups({"rest"})
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Groups({"rest"})
     */
    private $category;

    /**
     * @var TicketDepartment|null
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketDepartment")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    private $department;

    /**
     * @var TicketType
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketType")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Groups({"rest"})
     */
    private $ticketType;

    /**
     * @var TicketSubType|null
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketSubType")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     * @Groups({"rest"})
     */
    private $ticketSubType;

    /**
     * @var TicketRegion|null
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketRegion")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $ticketRegion;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="team_lead_user_id", referencedColumnName="id")
     */
    private $teamLead;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="responsible_user_id", referencedColumnName="id")
     */
    private $responsible;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="assigned_by_user_id", referencedColumnName="id", nullable=true)
     * @Groups({"rest"})
     */
    private $assignedBy;

    /**
     * @ORM\OneToMany(targetEntity="Ticket\EntityBundle\Entity\TicketItem", mappedBy="ticket")
     * @Groups({"rest"})
     */
    private $ticketItems;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="created_by_user_id", referencedColumnName="id")
     * @Groups({"rest"})
     */
    private $createdBy;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="closed_by_user_id", referencedColumnName="id")
     */
    private $closedBy;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $closedAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

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
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getTransition(): ?string
    {
        return $this->transition;
    }

    /**
     * @param string|null $transition
     */
    public function setTransition(?string $transition): void
    {
        $this->transition = $transition;
    }

    /**
     * @return mixed
     */
    public function getLastStateUpdatedBy()
    {
        return $this->lastStateUpdatedBy;
    }

    /**
     * @param mixed $lastStateUpdatedBy
     */
    public function setLastStateUpdatedBy($lastStateUpdatedBy): void
    {
        $this->lastStateUpdatedBy = $lastStateUpdatedBy;
    }

    /**
     * @return string|null
     */
    public function getEntity(): ?string
    {
        return $this->entity;
    }

    /**
     * @param string|null $entity
     */
    public function setEntity(?string $entity): void
    {
        $this->entity = $entity;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return TicketDepartment|null
     */
    public function getDepartment(): ?TicketDepartment
    {
        return $this->department;
    }

    /**
     * @param TicketDepartment|null $department
     */
    public function setDepartment(?TicketDepartment $department): void
    {
        $this->department = $department;
    }

    /**
     * @return TicketType
     */
    public function getTicketType(): TicketType
    {
        return $this->ticketType;
    }

    /**
     * @param TicketType $ticketType
     */
    public function setTicketType(TicketType $ticketType): void
    {
        $this->ticketType = $ticketType;
    }

    /**
     * @return TicketSubType|null
     */
    public function getTicketSubType(): ?TicketSubType
    {
        return $this->ticketSubType;
    }

    /**
     * @param TicketSubType|null $ticketSubType
     */
    public function setTicketSubType(?TicketSubType $ticketSubType): void
    {
        $this->ticketSubType = $ticketSubType;
    }

    /**
     * @return TicketRegion|null
     */
    public function getTicketRegion(): ?TicketRegion
    {
        return $this->ticketRegion;
    }

    /**
     * @param TicketRegion|null $ticketRegion
     */
    public function setTicketRegion(?TicketRegion $ticketRegion): void
    {
        $this->ticketRegion = $ticketRegion;
    }

    /**
     * @return User|null
     */
    public function getTeamLead(): ?User
    {
        return $this->teamLead;
    }

    /**
     * @param User|null $teamLead
     */
    public function setTeamLead(?User $teamLead): void
    {
        $this->teamLead = $teamLead;
    }

    /**
     * @return User|null
     */
    public function getResponsible(): ?User
    {
        return $this->responsible;
    }

    /**
     * @param User|null $responsible
     */
    public function setResponsible(?User $responsible): void
    {
        $this->responsible = $responsible;
    }

    /**
     * @return User|null
     */
    public function getAssignedBy(): ?User
    {
        return $this->assignedBy;
    }

    /**
     * @param User|null $assignedBy
     */
    public function setAssignedBy(?User $assignedBy): void
    {
        $this->assignedBy = $assignedBy;
    }

    /**
     * @return mixed
     */
    public function getTicketItems()
    {
        return $this->ticketItems;
    }

    /**
     * @param mixed $ticketItems
     */
    public function setTicketItems($ticketItems): void
    {
        $this->ticketItems = $ticketItems;
    }

    /**
     * @return User
     */
    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }

    /**
     * @param User $createdBy
     */
    public function setCreatedBy(User $createdBy): void
    {
        $this->createdBy = $createdBy;
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
     * @return User|null
     */
    public function getClosedBy(): ?User
    {
        return $this->closedBy;
    }

    /**
     * @param User|null $closedBy
     */
    public function setClosedBy(?User $closedBy): void
    {
        $this->closedBy = $closedBy;
    }

    /**
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->closedAt;
    }

    /**
     * @param \DateTime|null $closedAt
     */
    public function setClosedAt(?\DateTime $closedAt): void
    {
        $this->closedAt = $closedAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
