<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $table = 'user_notifications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'message_email', 'message_sms', 'support_email', 'support_sms', 'reminder_email', 'reminder_sms', 'policy_email', 'policy_sms', 'unsubscribe_email',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
