<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    //出品商品と紐付け
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }

    //購入と紐付け
    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }

    //いいねと紐付け
    public function likes()
    {
        return $this->hasMany('App\Like', 'user_id', 'id');
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($salesid)
    {
      return $this->like()->where('sales_id',$salesid)->exists();
    }

    // //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    // public function likes($salesid)
    // {
    //   if($this->isLike($salesid)){
    //     //もし既に「いいね」していたら何もしない
    //   } else {
    //     $this->like()->attach($salesid);
    //   }
    // }

    // //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    // public function unlike($salesid)
    // {
    //   if($this->isLike($salesid)){
    //     //もし既に「いいね」していたら消す
    //     $this->like()->detach($salesid);
    //   } else {
    //   }
    // }

    //フォローと紐付け
    public function follow()
    {
        return $this->hasMany('App\Follow');
    }

    //論理削除
    use SoftDeletes;
    //退会されたら紐づくデータも論理削除
    public static function boot()
    {
        parent::boot();

        static::deleted(function ($user) {
            $user->sale()->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function validate()
    {
        return [
            'name' => 'required',
        ];
    }
}
