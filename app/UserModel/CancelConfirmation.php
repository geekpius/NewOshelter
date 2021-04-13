<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;
use App\UserModel\Confirmation;

class CancelConfirmation extends Model
{
    protected $table = 'cancel_confirmations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'confirmation_id', 'reason', 
    ];

    public function confirmation(){
        return $this->belongsTo(Confirmation::class, 'confirmation_id');
    }


}
