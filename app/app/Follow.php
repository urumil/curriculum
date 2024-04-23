<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //テーブル結合
    //1人の使用者（user）に対して、多数のフォロー（Follow）
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
