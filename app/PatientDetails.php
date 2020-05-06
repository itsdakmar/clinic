<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $sex
 * @property string $race
 * @property string $dob
 * @property integer $weight
 * @property integer $height
 * @property string $matricNo
 * @property string $bloodGroup
 * @property string $phone
 * @property string $address_1
 * @property string $address_2
 * @property string $postcode
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class PatientDetails extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['userId', 'firstName', 'lastName', 'sex', 'race', 'dob', 'weight', 'height', 'matricNo', 'bloodGroup', 'phone', 'address_1', 'address_2', 'postcode', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
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

    /**
     * Get the user's sex.
     *
     * @return string
     */
    public function getSexAttribute()
    {
        return ($this->sex == 'M') ? 'Male' : 'Female';
    }
}
