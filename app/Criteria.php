<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    public function dimensi(){
        return $this->belongsTo(Dimension::class, 'dimension_id');
    }
}
