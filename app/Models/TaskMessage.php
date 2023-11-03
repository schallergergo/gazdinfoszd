<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskMessage extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
