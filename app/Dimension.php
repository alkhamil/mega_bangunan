<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    public function criteria(){
        return $this->hasMany(Criteria::class);
    }
}
