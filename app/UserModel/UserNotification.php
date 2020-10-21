<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $table = 'user_notifications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'message_email', 'message_sms', 'support_email', 'support_sms', 'reminder_email', 'reminder_sms', 
        'policy_email', 'policy_sms', 'unsubscribe_email',
    ];

    public function isEmailMessage() : bool
    {
        return $this->message_email == true;
    }

    public function isSmsMessage() : bool
    {
        return $this->message_sms == true;
    }

    public function isEmailSupport() : bool
    {
        return $this->support_email == true;
    }

    public function isSmsSupport() : bool
    {
        return $this->support_sms == true;
    }

    public function isEmailReminder() : bool
    {
        return $this->reminder_email == true;
    }

    public function isSmsReminder() : bool
    {
        return $this->reminder_sms == true;
    }

    public function isEmailPolicy() : bool
    {
        return $this->policy_email == true;
    }

    public function isSmsPolicy() : bool
    {
        return $this->policy_sms == true;
    }

    public function isUnsubscribeEmail() : bool
    {
        return $this->unsubscribe_email == true;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
