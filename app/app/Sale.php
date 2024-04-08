<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //テーブル結合
    public function purchase() {
        return $this->hasMany('App\Purchase', 'id', 'id');
    }
}
