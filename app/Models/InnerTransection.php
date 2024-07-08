<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InnerTransection extends Model
{
    use HasFactory,SoftDeletes;
    public function staff(){
        
            return $this->belongsTo(Staff::class,'expense_by','id');
        }
}
