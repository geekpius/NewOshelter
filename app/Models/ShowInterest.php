<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowInterest extends Model
{
    protected $table = 'show_interests';
    protected $primaryKey = 'id';

    const RESPONDED = 'responded';
    const NOT_RESPONDED = 'not responded';

    protected $fillable = [
        'external_id',
        'name',
        'phone',
        'status',
    ];


    public function getNameAttribute(string $value): void
    {
        $this->attributes['name'] = strtolower($value);
    }


}
