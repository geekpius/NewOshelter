<?php

namespace App\MessageModel;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'destination', 'message', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function destination(){
        return $this->belongsTo(User::class, 'destination');
    }


    /********* ATTRIBUTE PROPERTIES *********/
    public function limitName()
    {
        return Str::limit($this->user->name, 20, '');
    } 

    private function getMessageWithOutTag()
    {
        $pos = strpos($this->message, '<');
        if($pos !== false){
            return str_limit($this->message, $pos-1, '');
        }
        return $this->message;
    }

    public function limitMessage()
    {
        return Str::limit($this->getMessageWithOutTag(), 60, '...');
    }






}
