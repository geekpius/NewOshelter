<?php

namespace App\MessageModel;

use App\User;
use App\Admin;
use App\MessageModel\Reply;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'admin_id', 'message', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }


    public function replies()
    {
        return $this->hasMany(Reply::class);
    }






}
