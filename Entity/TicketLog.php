<?php

namespace Ticket\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="p_ticket_log")
 */
class TicketLog
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
     * @var TicketDepartment
     * @ORM\ManyToOne(targetEntity="Ticket\EntityBundle\Entity\TicketDepartment")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    private $department;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="action_by_user_id", referencedColumnName="id")
     */
    private $actionBy;

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
     * @return TicketDepartment
     */
    public function getDepartment(): TicketDepartment
    {
        return $this->department;
    }

    /**
     * @param TicketDepartment $department
     */
    public function setDepartment(TicketDepartment $department): void
    {
        $this->department = $department;
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
}
