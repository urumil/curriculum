<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['name', 'price', 'quality', 'comment', 'image'];
    //テーブル結合
    public function user() {  
        return $this->belongsTo('App\User', 'id', 'user_id');
    }


}
