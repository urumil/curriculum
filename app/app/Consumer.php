<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Consumer extends Model
{
    //ホワイトシルト方式（保存したいカラム名を設定）
    protected $fillable = ['name','email','password'];

    //テーブル結合
    //1人の使用者（Consumer）に対して、多数の出品（Sale)
    public function sale() {
        return $this->hasMany('App\Sale', 'id', 'id');
    }
}
