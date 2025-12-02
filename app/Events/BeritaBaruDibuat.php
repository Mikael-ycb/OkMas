<?php

namespace App\Events;

use App\Models\Berita;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BeritaBaruDibuat implements ShouldBroadcast
{
    use SerializesModels;

    public $berita;

    public function __construct(Berita $berita)
    {
        $this->berita = $berita;
    }

    public function broadcastOn()
    {
        return new Channel('berita-channel');
    }

    public function broadcastAs()
    {
        return 'berita-baru';
    }
}
