<?php namespace QuanticTelecom\MoloquentSupport\Events;

use QuanticTelecom\MoloquentSupport\Models\Comment;

class TicketWasCommented {

    /**
     * @var Comment
     */
    public $comment;

    /**
     * @param Comment $comment
     */
    function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}