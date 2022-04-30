<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    const ROLE_ADMIN = 1;
    const ROLE_READER = 0;
    public static function getRoles(){
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER=>'Читатель',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification(){
        // dd(555);
        $this->notify(new SendVerifyWithQueueNotification());
        // dd(666);
    }
    public function likedPosts(){
        return $this->belongsToMany(Post::class, 'post_user_likes','user_id','post_id');

    }
    public function comments(){
        return $this->hasMany(Comment::class,'user_id','id');
    }
}
