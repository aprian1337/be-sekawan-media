<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function requests(){
        return $this->belongsTo(Request::class);
    }

    public function stakeholders(){
        return $this->belongsTo(Stakeholder::class);
    }
}
