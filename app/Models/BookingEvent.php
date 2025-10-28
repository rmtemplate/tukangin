<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BookingEvent
 * 
 * @property int $id
 * @property int $booking_id
 * @property string|null $event
 * @property int|null $created_by
 * @property string|null $note
 * @property Carbon|null $created_at
 * 
 * @property Booking $booking
 * @property Collection|BookingEventChange[] $booking_event_changes
 *
 * @package App\Models
 */
class BookingEvent extends Model
{
	protected $table = 'booking_events';
	public $timestamps = false;

	protected $casts = [
		'booking_id' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'booking_id',
		'event',
		'created_by',
		'note'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function booking_event_changes()
	{
		return $this->hasMany(BookingEventChange::class, 'event_id');
	}
}
