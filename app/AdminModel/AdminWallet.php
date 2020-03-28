<?php

namespace App\AdminModel;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminWallet extends Model
{
    protected $table = 'admin_wallets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id', 'balance', 'currency',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }



    
}
