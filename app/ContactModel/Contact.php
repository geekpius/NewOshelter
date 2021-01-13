<?php

namespace App\ContactModel;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    protected $primaryKey = 'id';


    CONST IS_READ = true;

    protected $fillable = [
        'name', 'email', 'phone', 'help_desk', 'message', 'is_read',
    ];

}
