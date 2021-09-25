<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $table = 'user_requests';
    protected $primaryKey = 'id';

    CONST PENDING = 'pending';
    CONST APPROVED = 'approved';
    CONST REJECTED = 'rejected';
    CONST TAKEN = 'taken';


    protected $fillable = [
        'user_id',
        'external_id',
        'requestable_type',
        'requestable_id',
        'reason',
        'status',
    ];


    public function requestable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
