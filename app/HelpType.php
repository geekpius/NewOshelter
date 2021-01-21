<?php

namespace App;
use App\Help;

use Illuminate\Database\Eloquent\Model;

class HelpType extends Model
{
    protected $table = 'help_types';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function helps(){
        return $this->hasMany(Help::class);
    }


}
