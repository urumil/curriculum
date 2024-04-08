<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //テーブル結合
    //1人の使用者（Consumer）に対して、多数のフォロー（Follow）
    public function consumer() {
        return $this->belongsTo('App\Consumer', 'consumer_id', 'id');
    }
}
