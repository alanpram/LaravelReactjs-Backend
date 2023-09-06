<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_username',
        'user_email',
        'user_password',
        'user_uuid',
        'user_store',
        'user_password_reset'
    ];
    protected $hidden = ['user_password'];
    protected $casts = ['user_status' => 'boolean'];

    public function getAuthPassword(){
        return $this->user_password;
    }
}
