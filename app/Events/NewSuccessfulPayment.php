<?php

namespace App\Events;

use App\Account;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSuccessfulPayment implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $isSuccess;
    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($payments, $isSuccess)
    {
        $this->isSuccess = $isSuccess;
        $this->id = $payments->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['success-' . $this->id];
    }

    public function broadcastAs()
    {
        return 'newSuccessPayment';
    }
}
