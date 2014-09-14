<?php namespace QuanticTelecom\MoloquentSupport\Models;

use Jenssegers\Mongodb\Model as Moloquent;
use QuanticTelecom\Support\Contracts\Ticket as TicketInterface;

abstract class Ticket extends Moloquent implements TicketInterface {

    public function comments()
    {
        return $this->embedsMany('QuanticTelecom\MoloquentSupport\Comment');
    }

    abstract public function associateUser();
} 