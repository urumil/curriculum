<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    protected $fillable = [
        'name', 'price', 'quality', 'comment', 'image',
    ];

    //テーブル結合
    public function user() 
    {  
        return $this->belongsTo('App\User');
    }

    public function like()
    {
        return $this->hasMany('App\Like');
    }

    public function purchase()
    {
        return $this->hasMany('App\Purchase', 'sales_id', 'id');
    }

    //プルダウン検索機能にて使用
    public function pricelist()
    {
        $pricelist = Sale::pluck('price');
        return $pricelist;
    }

    //論理削除
    use SoftDeletes;

    
}
