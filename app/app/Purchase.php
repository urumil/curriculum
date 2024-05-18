<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
   protected $fillable = [
      'name', 'tel', 'postcard', 'address', 'good',
   ];

   //テーブル結合
   public function sale() {
    return $this->belongsTo('App\Sale', 'sales_id', 'id');
   }

   //1人の使用者（Consumer）に対して、多数の購入（Purchase）
   public function user() {
      return $this->belongsTo('App\User', 'user_id', 'id');
  }

}
