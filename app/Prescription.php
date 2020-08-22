<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $appointmentId
 * @property integer $drugId
 * @property int $quantityUsed
 * @property string $created_at
 * @property string $updated_at
 * @property Appointment $appointment
 * @property Drug $drug
 */
class Prescription extends Model
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
    protected $fillable = ['appointmentId', 'drugId', 'quantityUsed', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment()
    {
        return $this->belongsTo('App\Appointment', 'appointmentId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drug()
    {
        return $this->belongsTo('App\Drug', 'drugId');
    }
}
