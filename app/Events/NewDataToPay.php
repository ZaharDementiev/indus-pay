<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewDataToPay implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $bank;
    public $ifsc;
    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($account)
    {
        $this->name = $account->name;
        $this->bank = $account->bank_number;
        $this->ifsc = $account->ifsc;
        $this->id = $account->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['requisites-' . $this->id];
    }

    public function broadcastAs()
    {
        return 'newRequisites';
    }
}
