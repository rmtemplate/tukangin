<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * 
 * @property int $id
 * @property int $user_id
 * @property int $address_id
 * @property Carbon $schedule_start
 * @property Carbon $schedule_end
 * @property string|null $status
 * @property string|null $payment_method
 * @property float|null $subtotal
 * @property float|null $travel_fee
 * @property float|null $discount
 * @property float|null $total
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $cancelled_at
 * @property string|null $cancellation_reason
 * 
 * @property Address $address
 * @property BookingAssignment|null $booking_assignment
 * @property Collection|BookingEvent[] $booking_events
 * @property Collection|BookingItem[] $booking_items
 * @property ChatThread|null $chat_thread
 * @property CouponRedemption|null $coupon_redemption
 * @property Collection|Invoice[] $invoices
 * @property Collection|Payment[] $payments
 * @property Review|null $review
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'bookings';

	protected $casts = [
		'user_id' => 'int',
		'address_id' => 'int',
		'schedule_start' => 'datetime',
		'schedule_end' => 'datetime',
		'subtotal' => 'float',
		'travel_fee' => 'float',
		'discount' => 'float',
		'total' => 'float',
		'cancelled_at' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'address_id',
		'schedule_start',
		'schedule_end',
		'status',
		'payment_method',
		'subtotal',
		'travel_fee',
		'discount',
		'total',
		'notes',
		'cancelled_at',
		'cancellation_reason'
	];

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

	public function booking_assignment()
	{
		return $this->hasOne(BookingAssignment::class);
	}

	public function booking_events()
	{
		return $this->hasMany(BookingEvent::class);
	}

	public function booking_items()
	{
		return $this->hasMany(BookingItem::class);
	}

	public function chat_thread()
	{
		return $this->hasOne(ChatThread::class);
	}

	public function coupon_redemption()
	{
		return $this->hasOne(CouponRedemption::class);
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function review()
	{
		return $this->hasOne(Review::class);
	}
}
