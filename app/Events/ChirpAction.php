<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ChirpAction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chirpId;
    public $action;

    public function __construct($chirpId, $action)
    {
        $this->chirpId = $chirpId;
        $this->action = $action;
    }
}

