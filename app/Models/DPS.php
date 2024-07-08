<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DPS extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function dps()
    {
        return $this->belongsTo(Member::class,'account_number','id');
    }
}
