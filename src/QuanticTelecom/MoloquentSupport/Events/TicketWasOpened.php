<?php namespace QuanticTelecom\MoloquentSupport\Events;

use QuanticTelecom\MoloquentSupport\Models\Ticket;

class TicketWasOpened {

    /**
     * @var Ticket
     */
    public $ticket;

    /**
     * @param Ticket $ticket
     */
    function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
} 