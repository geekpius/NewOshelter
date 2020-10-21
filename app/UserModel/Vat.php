<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    protected $table = 'vats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'country', 'vat_id', 'name', 'address', 'city', 'region', 'zip',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
