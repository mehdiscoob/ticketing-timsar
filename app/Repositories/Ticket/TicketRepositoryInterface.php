<?php

namespace App\Repositories\Ticket;

use App\Models\Ticket;
use Illuminate\Pagination\LengthAwarePaginator;

interface TicketRepositoryInterface
{
    /**
     * Get a ticket by its ID.
     *
     * @param int $id
     * @return Ticket|null
     */
    public function find(int $id): ?Ticket;

    /**
     * Create a new ticket.
     *
     * @param array $data
     * @return Ticket
     */
    public function create(array $data): Ticket;

    /**
     * Update an existing ticket.
     *
     * @param Ticket $ticket
     * @param array $data
     * @return Ticket
     */
    public function update(Ticket $ticket, array $data): Ticket;

    /**
     * Delete a ticket.
     *
     * @param Ticket $ticket
     * @return bool
     */
    public function delete(Ticket $ticket): bool;

    /**
     * Get paginated list of tickets.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage): LengthAwarePaginator;
}
