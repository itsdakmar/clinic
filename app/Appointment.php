<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patientId
 * @property string $type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Timeslot[] $timeslots
 */
class Appointment extends Model
{
    public const CREATED = 1;
    public const CONFIRMED = 2;
    public const ONGOING = 3;
    public const EXAMINED = 4;
    public const RESOLVED = 5;
    public const CANCELED = 6;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['patientId', 'doctorId', 'type', 'status', 'bloodPressure', 'respiratoryRate', 'remark', 'temperature', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'patientId');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctorId');
    }

    public function prescription()
    {
        return $this->hasMany('App\Prescription', 'appointmentId');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function timeslots()
    {
        return $this->hasOne('App\Timeslot', 'appointmentId');
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status == self::CREATED) {
            return '<a href="#" class="badge p-1 badge-secondary align-top ">Created</a>';
        } elseif ($this->status == self::CONFIRMED) {
            return '<a href="#" class="badge p-1 badge-info align-top">Confirmed</a>';
        } elseif ($this->status == self::ONGOING) {
            return '<a href="#" class="badge p-1 badge-primary text-white align-top">On Going</a>';
        } elseif ($this->status == self::RESOLVED) {
            return '<a href="#" class="badge p-1 badge-success align-top">Resolved</a>';
        } elseif ($this->status == self::EXAMINED) {
            return '<a href="#" class="badge p-1 badge-outline-success align-top">Examined</a>';
        } elseif ($this->status == self::CANCELED) {
            return '<a href="#" class="badge p-1 badge-danger align-top">Canceled</a>';
        } else {
            return false;
        }
    }
}
