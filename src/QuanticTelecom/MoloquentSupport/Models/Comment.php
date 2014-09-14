<?php namespace QuanticTelecom\MoloquentSupport\Models;

use Jenssegers\Mongodb\Model as Moloquent;
use QuanticTelecom\Support\Contracts\Comment as CommentInterface;

abstract class Comment extends Moloquent implements CommentInterface {

    abstract public function associateUser();
} 