<?php

namespace App\SupportModel;

use App\SupportModel\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $table = 'ticket_replies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ticket_id', 'message', 'owner',
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }



}
