<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Ticket\TicketServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    protected $ticketService;

    /**
     * TicketController constructor.
     *
     * @param TicketServiceInterface $ticketService
     */
    public function __construct(TicketServiceInterface $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * Display a listing of the tickets.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 20); // Default per page is 10, you can adjust as needed
        $tickets = $this->ticketService->getPaginatedTickets($perPage);
        return response()->json($tickets);
    }

    /**
     * Display the specified ticket.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->ticketService->getTicketById($id);
        if (!$ticket) {
            return response()->json(['error' => 'Ticket not found'], 404);
        }
        return response()->json($ticket);
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request data here if needed

        $ticket = $this->ticketService->createTicket($request->all());
        return response()->json($ticket, 201);
    }

    /**
     * Update the specified ticket in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $ticket = $this->ticketService->updateTicket($id, $request->all());
        return response()->json($ticket);
    }

    /**
     * Remove the specified ticket from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $deleted = $this->ticketService->deleteTicket($id);
        if (!$deleted) {
            return response()->json(['error' => 'Ticket not found'], 404);
        }
        return response()->json(['message' => 'Ticket deleted successfully']);
    }
}
