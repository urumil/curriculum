<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
   //テーブル結合
   public function sale() {
    return $this->belongsTo('App\Sale', 'sale_id', 'id');
   }

   //1人の使用者（Consumer）に対して、多数の購入（Purchase）
   public function consumer() {
      return $this->belongsTo('App\Consumer', 'consumer_id', 'id');
  }
}
