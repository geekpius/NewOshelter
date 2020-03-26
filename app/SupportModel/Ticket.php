<?php

namespace App\SupportModel;

use App\Admin;
use App\SupportModel\TicketReply;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id', 'help_desk', 'subject', 'message', 'status',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }


    public function ticketReplies()
    {
        return $this->hasMany(TicketReply::class);
    }



}
