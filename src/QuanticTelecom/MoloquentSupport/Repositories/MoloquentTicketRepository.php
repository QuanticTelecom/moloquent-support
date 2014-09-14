<?php namespace QuanticTelecom\MoloquentSupport\Repositories;

use QuanticTelecom\MoloquentSupport\Models\Ticket;
use QuanticTelecom\Support\Contracts\Ticket as TicketInterface;
use QuanticTelecom\Support\Repositories\TicketRepository;

class MoloquentTicketRepository implements TicketRepository {

    /**
     * @param TicketInterface $ticket
     * @return bool
     */
    public function save(TicketInterface $ticket)
    {
        return $ticket->save();
    }

    /**
     * @param $ticketId
     * @return Ticket
     */
    public function findById($ticketId)
    {
        return Ticket::findOrFail($ticketId);
    }
}