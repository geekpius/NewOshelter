<?php

namespace App\MessageModel;

use App\User;
use App\MessageModel\Reply;
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


    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /********* ATTRIBUTE PROPERTIES *********/
    public function limitName()
    {
        return Str::limit($this->user->name, 20, '');
    } 

    public function limitMessage()
    {
        return Str::limit($this->message, 60, '...');
    }






}
