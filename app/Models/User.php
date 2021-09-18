<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

	const PENDING   = 1;
	const INFO      = 2;
	const DELIVERED = 3;
	const DANGER    = 4;

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

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function getStatusName()
	{
        $statuses = [
            self::PENDING   => 'PENDING',
            self::INFO      => 'INFO',
            self::DELIVERED => 'DELIVERED',
            self::DANGER    => 'DANGER',
        ];

        return $statuses[$this->status];
	}

    public function getStatusClass()
    {
        $statuses = [
            self::PENDING   => 'bg-purple',
            self::INFO      => 'bg-yellow',
            self::DELIVERED => 'bg-green',
            self::DANGER    => 'bg-red',
        ];

        return $statuses[$this->status];
    }
}
