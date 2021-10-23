<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectReason extends Model
{
    protected $table = 'reject_reasons';
    protected $primaryKey = 'id';

    const READ = 'read';
    const  NOT_READ = 'not read';


    protected $fillable = ['status', 'user_id', 'reason', 'external_id', 'rejectable_type', 'rejectable_id'];

    public function rejectable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rejectedReasonType(): string
    {
        if($this->rejectable_type === 'App\PropertyModel\Property') return 'Property rejection';

        if($this->rejectable_type === 'App\Models\UserRequest') return $this->rejectable->userRequestType();

        return 'General rejection';
    }



}
