<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceAddon
 * 
 * @property int $id
 * @property int $service_id
 * @property string|null $name
 * @property float|null $price
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Service $service
 * @property Collection|BookingItemAddon[] $booking_item_addons
 *
 * @package App\Models
 */
class ServiceAddon extends Model
{
	protected $table = 'service_addons';

	protected $casts = [
		'service_id' => 'int',
		'price' => 'float',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'service_id',
		'name',
		'price',
		'is_active'
	];

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function booking_item_addons()
	{
		return $this->hasMany(BookingItemAddon::class, 'addon_id');
	}
}
