<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method User firstOrNew(array $array)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'o_auth_token',
        'picture'
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
        'password' => 'hashed',
    ];


    /**
     * Method to update user from oAuth2.0
     * @param \Laravel\Socialite\Two\User $user
     * @return User
     */
    public function socialUserCreateOrUpdate(\Laravel\Socialite\Two\User $user): static
    {

        $save = false;
        if ($this->name !=  $user->getName()){
            $this->name = $user->getName();
            $save = true;
        }
        if(!$this->email_verified_at){
            $this->email_verified_at = Carbon::now();
            $save = true;
        }
        if(!$this->password){
            $this->password = bcrypt(Str::random());
            $save = true;
        }
        if($this->o_auth_token!= $user->getId()){
            $this->o_auth_token = $user->getId();
            $save = true;
        }
        if($this->picture!=$user->getAvatar()){
            $this->picture = $user->avatar;
            $save = true;
        }
        if ($save){
            $this->save();
        }

        return $this;
    }
}
