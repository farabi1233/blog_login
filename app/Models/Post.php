<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Post extends Model
{
    protected $guarded = ['created_at', 'deleted_at'];

    protected $dates = [
        'published_at',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
