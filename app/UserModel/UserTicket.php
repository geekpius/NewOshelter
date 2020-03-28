<?php

namespace App\UserModel;

use App\User;
use App\UserModel\UserTicketReply;
use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    protected $table = 'user_tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'help_desk', 'subject', 'message', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function userTicketReplies()
    {
        return $this->hasMany(UserTicketReply::class);
    }



}
