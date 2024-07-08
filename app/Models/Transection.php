<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transection extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

        public function Transection()
        {
            return $this->belongsTo(Member::class, 'account_id', 'id');
        }
        public function staff()
        {
            return $this->belongsTo(Staff::class, 'expense_by', 'id');
        }
}
