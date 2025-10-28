<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BookingItemAddon
 * 
 * @property int $id
 * @property int $booking_item_id
 * @property int $addon_id
 * @property string|null $addon_name
 * @property float|null $addon_price
 * @property int|null $qty
 * @property Carbon|null $created_at
 * 
 * @property BookingItem $booking_item
 * @property ServiceAddon $service_addon
 *
 * @package App\Models
 */
class BookingItemAddon extends Model
{
	protected $table = 'booking_item_addons';
	public $timestamps = false;

	protected $casts = [
		'booking_item_id' => 'int',
		'addon_id' => 'int',
		'addon_price' => 'float',
		'qty' => 'int'
	];

	protected $fillable = [
		'booking_item_id',
		'addon_id',
		'addon_name',
		'addon_price',
		'qty'
	];

	public function booking_item()
	{
		return $this->belongsTo(BookingItem::class);
	}

	public function service_addon()
	{
		return $this->belongsTo(ServiceAddon::class, 'addon_id');
	}
}
