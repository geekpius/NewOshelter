<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\PaymentModel\Transaction;
use App\UserModel\UserExtensionRequest;

class ExtensionTransaction extends Model
{
    protected $table = 'extension_transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'transaction_id',
        'extension_id',
        'property_type', 
    ];

    /*********** METHODS RELATIONSHIP *************/
    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function userExtensionRequest(){
        return $this->belongsTo(UserExtensionRequest::class, 'extension_id');
    }

}
