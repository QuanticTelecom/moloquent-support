<?php namespace QuanticTelecom\MoloquentSupport\Factories;

use Laracasts\Commander\Events\EventGenerator;
use QuanticTelecom\MoloquentSupport\Events\TicketWasOpened;
use QuanticTelecom\MoloquentSupport\Models\Ticket;
use QuanticTelecom\Support\Contracts\OpenTicket as OpenTicketInterface;

class OpenTicket implements OpenTicketInterface {

    use EventGenerator;

    /**
     * @var Ticket
     */
    private $ticket;

    /**
     * @param Ticket $ticket
     */
    function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @param $userId
     * @return OpenTicketInterface
     */
    public function by($userId)
    {
        $this->ticket->associateUser($userId);
        return $this;
    }

    /**
     * @param $body
     * @return OpenTicketInterface
     */
    public function withText($body)
    {
        $this->ticket->body = $body;
        return $this;
    }

    /**
     * @return Ticket
     */
    public function get()
    {
        $this->raise(new TicketWasOpened($this->ticket));
        return $this->ticket;
    }
}