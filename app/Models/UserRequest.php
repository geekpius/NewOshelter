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
        'type',
        'status',
        'type',
    ];


    public function requestable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeRentRequests()
    {
        return UserRequest::where('requestable_type', 'App\Models\RentRequest');
    }

    public function scopePendingRentRequests()
    {
        return UserRequest::where('requestable_type', 'App\Models\RentRequest')->where('status', UserRequest::PENDING);
    }

    public function scopeShortStayRequests()
    {
        return UserRequest::where('requestable_type', 'App\Models\ShortStayRequest');
    }

    public function scopePendingShortStayRequests()
    {
        return UserRequest::where('requestable_type', 'App\Models\ShortStayRequest')->where('status', UserRequest::PENDING);
    }

    public function pendingUserRequests()
    {
        return UserRequest::where('status', UserRequest::PENDING);
    }

    public function userRequestType(): string
    {
        if($this->requestable_type === 'App\Models\RentRequest') return 'Rent booking rejection';

        if($this->requestable_type === 'App\Models\ShortStayRequest') return 'Short stay booking rejection';

        if($this->requestable_type === 'App\Models\SaleRequest') return 'Sale booking rejection';

        if($this->requestable_type === 'App\Models\AuctionRequest') return 'Auction booking rejection';

        if($this->requestable_type === 'App\Models\HostelRequest') return 'Hostel booking rejection';

        return 'General rejection';
    }



}
