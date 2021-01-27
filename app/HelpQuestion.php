<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HelpTopic;

class HelpQuestion extends Model
{
    protected $table = 'help_questions';
    protected $primaryKey = 'id';


    public function getAnswerLimit(): string
    {
        return str_limit($this->answer, 100, "....");
    }
    
    public function helpTopic(){
        return $this->belongsTo(HelpTopic::class, 'help_topic_id');
    }
}
