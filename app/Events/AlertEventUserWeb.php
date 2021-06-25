<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AlertEventUserWeb implements ShouldBroadcast 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $title;
    public $icon;
    public $image;
    public $linkurl;
    public $userweb_id;
    public $PUSHER_APP_CHANNELNAME;
    public $PUSHER_APP_EVENTNAME;

    public function __construct($title,$message, $PUSHER_APP_CHANNELNAME, $PUSHER_APP_EVENTNAME, $userweb_id, $icon='', $image= '', $linkurl='' )
    {
      $this->message = $message;
      $this->title = $title;
      $this->icon = $icon;
      $this->image = $image;
      $this->linkurl = $linkurl;
      $this->userweb_id = $userweb_id;
      $this->PUSHER_APP_CHANNELNAME = $PUSHER_APP_CHANNELNAME;
      $this->PUSHER_APP_EVENTNAME = $PUSHER_APP_EVENTNAME;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */


    public function broadcastOn()
    {
        return new Channel(env('PUSHERNOTIFICATIONVALUE').$this->PUSHER_APP_CHANNELNAME."uid".$this->userweb_id);
    }

    public function broadcastAs()
    {
      return env('PUSHERNOTIFICATIONVALUE').$this->PUSHER_APP_EVENTNAME."Eventuid".$this->userweb_id;
    }


}
