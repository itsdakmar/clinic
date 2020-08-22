<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $appointmentId
 * @property string $date
 * @property int $hour
 * @property int $minute
 * @property string $created_at
 * @property string $updated_at
 * @property Appointment $appointment
 */
class Timeslot extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $dates = ['date'];

    protected $dateFormat = 'Y-m-d';
    /**
     * @var array
     */
    protected $fillable = ['appointmentId', 'date', 'hour', 'minute', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment()
    {
        return $this->belongsTo('App\Appointment', 'appointmentId');
    }
}
