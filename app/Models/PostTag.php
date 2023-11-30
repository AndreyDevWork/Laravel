<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $guarded = false;
    protected $table = 'post_tags';
    use HasFactory;
}
