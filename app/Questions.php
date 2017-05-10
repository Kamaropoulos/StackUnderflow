<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    public $timestamps = true;

    public function answers() {
        return $this->hasMany('Answer');
    }

    public function votes() {
        return $this->hasMany('Votes');
    }


}
