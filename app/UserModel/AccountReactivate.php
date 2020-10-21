<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;

class AccountReactivate extends Model
{
    protected $table = 'account_reactivates';

    protected $fillable = [
        'email', 'token',
    ];

    
}
