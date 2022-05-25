<?php

namespace Ticket\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity()
 * @ORM\Table(name="p_ticket_responsible_log")
 */
class TicketResponsibleLog
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Ticket
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\Ticket")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $ticket;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="responsible_user_id", referencedColumnName="id")
     */
    private $responsibleUser;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="assigning_user_id", referencedColumnName="id", nullable=true)
     */
    private $assigningUser;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Ticket
     */
    public function getTicket(): Ticket
    {
        return $this->ticket;
    }

    /**
     * @param Ticket $ticket
     */
    public function setTicket(Ticket $ticket): void
    {
        $this->ticket = $ticket;
    }

    /**
     * @return User
     */
    public function getResponsibleUser(): User
    {
        return $this->responsibleUser;
    }

    /**
     * @param User $responsibleUser
     */
    public function setResponsibleUser(User $responsibleUser): void
    {
        $this->responsibleUser = $responsibleUser;
    }

    /**
     * @return User|null
     */
    public function getAssigningUser(): ?User
    {
        return $this->assigningUser;
    }

    /**
     * @param User|null $assigningUser
     */
    public function setAssigningUser(?User $assigningUser): void
    {
        $this->assigningUser = $assigningUser;
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
}
