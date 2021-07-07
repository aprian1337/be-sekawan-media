<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stakeholder extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function approvals(){
        return $this->hasMany(Approval::class);
    }
}
