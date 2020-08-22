<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property integer $id
 * @property string $matricStaffId
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $password
 * @property integer $is_student
 */

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricStaffId', 'firstName','active', 'lastName', 'email', 'password', 'is_student'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_student' => 'boolean',
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
     * Convert everything to uppercase every time get.
     * @param string $key
     * @return mixed|string
     */
    public function __get($key)
    {
        if ($key !== 'password' && is_string($this->getAttribute($key))) {
            return strtoupper($this->getAttribute($key));
        } else {
            return $this->getAttribute($key);
        }
    }

    /**
     * Get the patient details associated with the user.
     */
    public function patientDetail()
    {
        return $this->hasOne('App\PatientDetail', 'userId');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
