<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;
use App\Models\Article;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function favorites()
    {
        //お気に入りテーブルリレーション
        return $this->belongsToMany('App\Models\Article', 'favorites')->withTimestamps();
    }

    public function followers()
    {
        //フォロワーにアクセス
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follower_id')->withTimestamps();
    }

    public function followings()
    {
        //フォローするためのアクセス
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'user_id')->withTimestamps();
    }

    //フォロー中かどうかを判定する
    public function isFollowedBy(?User $user)
    {
        return $user
            ? (bool) $this->followers->where('id', $user->id)->count()
            : false;
    }

    //フォロワーの数
    public function getCountFollowersAttribute()
    {
        return $this->followers->count();
    }

    //フォローしている人の数
    public function getCountFollowingsAttribute()
    {
        return $this->followings->count();
    }
}
