<?php

namespace Ticket\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity()
 * @ORM\Table(name="p_ticket_department_time_log")
 */
class TicketDepartmentTimeLog
{
    /**
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
     * @var boolean|null
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $action;

    /**
     * @var TicketDepartment
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketDepartment")
     * @ORM\JoinColumn(name="from_ticket_department_id", referencedColumnName="id")
     */
    private $fromTicketDepartment;

    /**
     * @var TicketDepartment
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketDepartment")
     * @ORM\JoinColumn(name="to_ticket_department_id", referencedColumnName="id")
     */
    private $toTicketDepartment;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="action_by_user_id", referencedColumnName="id")
     */
    private $actionBy;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $startAt;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endAt;

    /**
     * @return mixed
     */
    public function getId()
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
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string|null $action
     */
    public function setAction(?string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return TicketDepartment
     */
    public function getFromTicketDepartment(): TicketDepartment
    {
        return $this->fromTicketDepartment;
    }

    /**
     * @param TicketDepartment $fromTicketDepartment
     */
    public function setFromTicketDepartment(TicketDepartment $fromTicketDepartment): void
    {
        $this->fromTicketDepartment = $fromTicketDepartment;
    }

    /**
     * @return TicketDepartment
     */
    public function getToTicketDepartment(): TicketDepartment
    {
        return $this->toTicketDepartment;
    }

    /**
     * @param TicketDepartment $toTicketDepartment
     */
    public function setToTicketDepartment(TicketDepartment $toTicketDepartment): void
    {
        $this->toTicketDepartment = $toTicketDepartment;
    }

    /**
     * @return User
     */
    public function getActionBy(): User
    {
        return $this->actionBy;
    }

    /**
     * @param User $actionBy
     */
    public function setActionBy(User $actionBy): void
    {
        $this->actionBy = $actionBy;
    }

    /**
     * @return \DateTime
     */
    public function getStartAt(): \DateTime
    {
        return $this->startAt;
    }

    /**
     * @param \DateTime $startAt
     */
    public function setStartAt(\DateTime $startAt): void
    {
        $this->startAt = $startAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getEndAt(): ?\DateTime
    {
        return $this->endAt;
    }

    /**
     * @param \DateTime|null $endAt
     */
    public function setEndAt(?\DateTime $endAt): void
    {
        $this->endAt = $endAt;
    }
}
