<?php

namespace App\UserModel;

use App\UserModel\UserTicket;
use Illuminate\Database\Eloquent\Model;

class UserTicketReply extends Model
{
    protected $table = 'user_ticket_replies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_ticket_id', 'message', 'owner',
    ];

    public function userTicket(){
        return $this->belongsTo(UserTicket::class, 'user_ticket_id');
    }

}
