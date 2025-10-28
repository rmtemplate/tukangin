<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookingEventChange
 * 
 * @property int $id
 * @property int $event_id
 * @property string|null $field_name
 * @property string|null $old_value
 * @property string|null $new_value
 * 
 * @property BookingEvent $booking_event
 *
 * @package App\Models
 */
class BookingEventChange extends Model
{
	protected $table = 'booking_event_changes';
	public $timestamps = false;

	protected $casts = [
		'event_id' => 'int'
	];

	protected $fillable = [
		'event_id',
		'field_name',
		'old_value',
		'new_value'
	];

	public function booking_event()
	{
		return $this->belongsTo(BookingEvent::class, 'event_id');
	}
}
