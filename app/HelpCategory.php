<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HelpTopic;

class HelpCategory extends Model
{
    protected $table = 'help_categories';
    protected $primaryKey = 'id';



    public function setTopicAttribute($value): void
    {
        $this->attributes['topic'] = ucwords($value);
    }

    public function getCategory(): string
    {
        return ucwords($this->category);
    }

    public function helpTopics(){
        return $this->hasMany(HelpTopic::class);
    }

}