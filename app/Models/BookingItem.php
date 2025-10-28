<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BookingItem
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $service_id
 * @property string|null $service_sku
 * @property string|null $service_name
 * @property string|null $unit
 * @property int|null $qty
 * @property float|null $price
 * @property Carbon|null $created_at
 * 
 * @property Booking $booking
 * @property Service $service
 * @property Collection|BookingItemAddon[] $booking_item_addons
 *
 * @package App\Models
 */
class BookingItem extends Model
{
	protected $table = 'booking_items';
	public $timestamps = false;

	protected $casts = [
		'booking_id' => 'int',
		'service_id' => 'int',
		'qty' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'booking_id',
		'service_id',
		'service_sku',
		'service_name',
		'unit',
		'qty',
		'price'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function booking_item_addons()
	{
		return $this->hasMany(BookingItemAddon::class);
	}
}
