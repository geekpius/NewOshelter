<?php

namespace App\MessageModel;

use Illuminate\Database\Eloquent\Model;
use App\MessageModel\Message;

class Reply extends Model
{
    protected $table = 'replies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'message_id', 'message', 'status',
    ];

    public function message(){
        return $this->belongsTo(Message::class, 'message_id');
    }

    


}
