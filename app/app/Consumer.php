<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    //テーブル結合
    //1人の使用者（Consumer）に対して、多数の出品（Sale)
    public function sale() {
        return $this->hasMany('App\Sale', 'id', 'id');
    }
}
