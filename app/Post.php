<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = array('id');
    protected $dates = ['deleted_at'];

    public static $rules = array(
        'body' => 'required',
        'created_at' => 'date',
        'updated_at' => 'date',
    );
}
