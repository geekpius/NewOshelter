<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HelpCategory; 
use App\HelpQuestion; 

class HelpTopic extends Model
{
    protected $table = 'help_topics';
    protected $primaryKey = 'id';


    public function helpCategory(){
        return $this->belongsTo(HelpCategory::class, 'help_category_id');
    }

    public function helpQuestions(){
        return $this->hasMany(HelpQuestion::class);
    }

}
