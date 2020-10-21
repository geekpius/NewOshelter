<?php

namespace App\SupportModel;

use App\User;
use App\SupportModel\TicketReply;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'help_desk', 'subject', 'message', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function ticketReplies()
    {
        return $this->hasMany(TicketReply::class);
    }



}
