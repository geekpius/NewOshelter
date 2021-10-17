<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_name', 'package_price', 'package_description',
    ];


    public function setPackageNameAttribute(string $value): void
    {
        $this->attributes['package_name'] = strtolower($value);
    }


    public function getPackageNameAttribute(string $value): string
    {
        return ucwords($value);
    }

    
}
