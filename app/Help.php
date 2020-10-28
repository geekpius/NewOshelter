<?php

namespace App;
use App\HelpType;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'helps';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'help_type_id', 'document_name', 'question', 'answer',
    ];


    public function helpType(){
        return $this->belongsTo(HelpType::class, 'help_type_id');
    }

}
