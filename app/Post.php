<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public static $rules = array(
        'body' => 'required|max:255',
        'created_at' => 'date',
        'updated_at' => 'date',
    );

    public function user(){
        return $this->belongsTo('App\User');
    }
}
