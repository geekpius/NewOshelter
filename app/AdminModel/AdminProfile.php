<?php

namespace App\AdminModel;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $table = 'admin_profiles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id', 'dob', 'city', 'occupation', 'business_name', 'description',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }




}
