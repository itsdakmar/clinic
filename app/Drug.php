<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $quantity
 * @property string $description
 * @property string $expired_date
 * @property string $created_at
 * @property string $updated_at
 */
class Drug extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
    protected $dates = ['expired_date'];

    /**
     * @var array
     */
    protected $fillable = ['name','price', 'quantity', 'description', 'expired_date', 'created_at', 'updated_at'];

}
