<?php namespace QuanticTelecom\MoloquentSupport\Repositories;

use QuanticTelecom\Support\Contracts\Comment;
use QuanticTelecom\Support\Repositories\CommentRepository;

class MoloquentCommentRepository implements CommentRepository {

    /**
     * @param Comment $comment
     * @return bool
     */
    public function save(Comment $comment)
    {
        return $this->ticket->save();
    }
}