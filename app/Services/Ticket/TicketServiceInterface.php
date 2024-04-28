<?php

namespace App\Services\Ticket;

use App\Models\Ticket;
use Illuminate\Pagination\LengthAwarePaginator;

interface TicketServiceInterface
{
    /**
     * Get a ticket by its ID.
     *
     * @param int $id
     * @return Ticket|null
     */
    public function getTicketById(int $id): ?Ticket;

    /**
     * Create a new ticket.
     *
     * @param array $data
     * @return Ticket
     */
    public function createTicket(array $data): Ticket;

    /**
     * Update an existing ticket.
     *
     * @param int $id
     * @param array $data
     * @return Ticket
     */
    public function updateTicket(int $id, array $data): Ticket;

    /**
     * Delete a ticket.
     *
     * @param int $id
     * @return bool
     */
    public function deleteTicket(int $id): bool;

    /**
     * Get paginated list of tickets.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedTickets(int $perPage): LengthAwarePaginator;
}
