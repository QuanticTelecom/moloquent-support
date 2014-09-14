<?php namespace QuanticTelecom\MoloquentSupport\Factories;

use Laracasts\Commander\Events\EventGenerator;
use QuanticTelecom\MoloquentSupport\Events\TicketWasCommented;
use QuanticTelecom\MoloquentSupport\Models\Comment;
use QuanticTelecom\Support\Contracts\WriteComment as WriteCommentInterface;
use QuanticTelecom\Support\Repositories\TicketRepository;

class WriteComment implements WriteCommentInterface {

    use EventGenerator;

    /**
     * @var Comment
     */
    private $comment;
    /**
     * @var TicketRepository
     */
    private $ticketRepository;

    /**
     * @param Comment $comment
     * @param TicketRepository $ticketRepository
     */
    function __construct(Comment $comment, TicketRepository $ticketRepository)
    {
        $this->comment = $comment;
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * @param $userId
     * @return WriteCommentInterface
     */
    public function by($userId)
    {
        $this->comment->associateUser($userId);
    }

    /**
     * @param $body
     * @return WriteCommentInterface
     */
    public function withText($body)
    {
        $this->comment->body = $body;
    }

    /**
     * @param $ticketId
     * @return WriteCommentInterface
     */
    public function about($ticketId)
    {
        $ticket = $this->ticketRepository->findById($ticketId);
        $ticket->comments()->associate($this->comment);
    }

    /**
     * @return Comment
     */
    public function get()
    {
        $this->raise(new TicketWasCommented($this->comment));
        return $this->comment;
    }
}