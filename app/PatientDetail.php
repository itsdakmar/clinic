<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $userId
 * @property string $sex
 * @property string $race
 * @property string $dob
 * @property integer $weight
 * @property integer $height
 * @property string $bloodGroup
 * @property string $phone
 * @property string $address_1
 * @property string $address_2
 * @property integer $cityId
 * @property integer $stateId
 * @property string $postcode
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property State $state
 * @property User $user
 */
class PatientDetail extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    protected $dates = ['dob'];

    /**
     * @var array
     */
    protected $fillable = ['userId', 'sex', 'race', 'dob', 'weight', 'height', 'bloodGroup', 'phone', 'address_1', 'address_2', 'cityId', 'stateId', 'postcode', 'created_at', 'updated_at'];

    public function __get($key)
    {
        if (is_string($this->getAttribute($key))) {
            return strtoupper($this->getAttribute($key));
        } else {
            return $this->getAttribute($key);
        }
    }

//    /**
//     * Set the dob to mysql format.
//     *
//     * @param  string  $value
//     * @return void
//     */
//    public function setDobAttribute($value)
//    {
//        $this->attributes['dob'] = Carbon::CreateFromFormat('d/m/Y', $value)->format('Y-m-d H:i:s');
//    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City', 'cityId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\State', 'stateId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    /**
     * Get the user's sex.
     *
     * @return string
     */
    public function getSexAttribute()
    {
        return ($this->attributes['sex'] == 'M') ? 'Male' : 'Female';
    }

    /**
     * Get the user's sex.
     *
     * @return string
     */
    public function getRaceAttribute()
    {
        switch ($this->attributes['race']) {
            case 'M':
                return 'Malay';
                break;
            case 'C':
                return 'Chinese';
                break;
            case 'I':
                return 'Indian';
                break;
            case 'O':
                return 'Others';
                break;
            default:
                return false;

        }
    }
}
