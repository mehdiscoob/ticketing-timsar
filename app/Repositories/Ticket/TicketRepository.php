<?php

namespace App\Repositories\Ticket;

use App\Models\Ticket;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketRepository implements TicketRepositoryInterface
{
    /**
     * Find a ticket by its ID.
     *
     * @param int $id
     * @return Ticket|null
     */
    public function find(int $id): ?Ticket
    {
        return Ticket::find($id);
    }

    /**
     * Create a new ticket.
     *
     * @param array $data
     * @return Ticket
     */
    public function create(array $data): Ticket
    {
        return Ticket::create($data);
    }

    /**
     * Update an existing ticket.
     *
     * @param Ticket $ticket
     * @param array $data
     * @return Ticket
     */
    public function update(Ticket $ticket, array $data): Ticket
    {
        $ticket->update($data);
        return $ticket;
    }

    /**
     * Delete a ticket.
     *
     * @param Ticket $ticket
     * @return bool
     */
    public function delete(Ticket $ticket): bool
    {
        return $ticket->delete();
    }

    /**
     * Get paginated list of tickets.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage): LengthAwarePaginator
    {
        return Ticket::paginate($perPage);
    }
}
