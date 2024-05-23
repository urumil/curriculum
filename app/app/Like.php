<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // 配列内の要素を書き込み可能にする
    protected $fillable = ['sales_id','user_id'];

    //テーブル結合
    //1つの出品（Sale）に対して、多数のいいね（Like）
    public function sale() {
        return $this->belongsTo('App\Sale', 'sales_id', 'id');
    }

    //1人の使用者（User）に対して、多数のいいね（Like)
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function like_exist($user_id, $sales_id) {        
        return Like::where('user_id', $user_id)->where('ssales_id', $sales_id)->exists();       
    }
}
