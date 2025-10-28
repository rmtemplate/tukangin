<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BookingAssignment
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $technician_id
 * @property int|null $assigned_by
 * @property Carbon|null $assigned_at
 * @property Carbon|null $confirmed_at
 * @property Carbon|null $started_at
 * @property Carbon|null $finished_at
 * 
 * @property Booking $booking
 * @property Technician $technician
 *
 * @package App\Models
 */
class BookingAssignment extends Model
{
	protected $table = 'booking_assignments';
	public $timestamps = false;

	protected $casts = [
		'booking_id' => 'int',
		'technician_id' => 'int',
		'assigned_by' => 'int',
		'assigned_at' => 'datetime',
		'confirmed_at' => 'datetime',
		'started_at' => 'datetime',
		'finished_at' => 'datetime'
	];

	protected $fillable = [
		'booking_id',
		'technician_id',
		'assigned_by',
		'assigned_at',
		'confirmed_at',
		'started_at',
		'finished_at'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function technician()
	{
		return $this->belongsTo(Technician::class);
	}
}
