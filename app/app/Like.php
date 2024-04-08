<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //テーブル結合
    //1つの出品（Sale）に対して、多数のいいね（Like）
    public function sale() {
        return $this->belongsTo('App\Sale', 'sale_id', 'id');
    }

    //1人の使用者（Consumer）に対して、多数のいいね（Like)
    public function consumer() {
        return $this->belongsTo('App\Consumer', 'consumer_id', 'id');
    }
}