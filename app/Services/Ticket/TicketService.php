<?php

namespace App\Services\Ticket;

use App\Models\Ticket;
use App\Repositories\Ticket\TicketRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketService implements TicketServiceInterface
{
    protected $ticketRepository;

    /**
     * TicketService constructor.
     *
     * @param TicketRepositoryInterface $ticketRepository
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Get a ticket by its ID.
     *
     * @param int $id
     * @return Ticket|null
     */
    public function getTicketById(int $id): ?Ticket
    {
        return $this->ticketRepository->find($id);
    }

    /**
     * Create a new ticket.
     *
     * @param array $data
     * @return Ticket
     */
    public function createTicket(array $data): Ticket
    {
        return $this->ticketRepository->create($data);
    }

    /**
     * Update an existing ticket.
     *
     * @param int $id
     * @param array $data
     * @return Ticket
     */
    public function updateTicket(int $id, array $data): Ticket
    {
        $ticket = $this->getTicketById($id);
        return $this->ticketRepository->update($ticket, $data);
    }

    /**
     * Delete a ticket.
     *
     * @param int $id
     * @return bool
     */
    public function deleteTicket(int $id): bool
    {
        $ticket = $this->getTicketById($id);
        if ($ticket) {
            return $this->ticketRepository->delete($ticket);
        }
        return false;
    }

    /**
     * Get paginated list of tickets.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedTickets(int $perPage): LengthAwarePaginator
    {
        return $this->ticketRepository->paginate($perPage);
    }
}
