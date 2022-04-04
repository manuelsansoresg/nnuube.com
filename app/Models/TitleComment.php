<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_user_id','user_id','comment'
    ];
}
