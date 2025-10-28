<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponRedemption
 * 
 * @property int $id
 * @property int $coupon_id
 * @property int $user_id
 * @property int $booking_id
 * @property Carbon|null $used_at
 * 
 * @property Coupon $coupon
 * @property Booking $booking
 *
 * @package App\Models
 */
class CouponRedemption extends Model
{
	protected $table = 'coupon_redemptions';
	public $timestamps = false;

	protected $casts = [
		'coupon_id' => 'int',
		'user_id' => 'int',
		'booking_id' => 'int',
		'used_at' => 'datetime'
	];

	protected $fillable = [
		'coupon_id',
		'user_id',
		'booking_id',
		'used_at'
	];

	public function coupon()
	{
		return $this->belongsTo(Coupon::class);
	}

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}
}
