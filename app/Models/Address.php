<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $label
 * @property string|null $detail
 * @property float|null $lat
 * @property float|null $lng
 * @property int|null $city_id
 * @property int|null $district_id
 * @property bool|null $is_default
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City|null $city
 * @property District|null $district
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'addresses';

	protected $casts = [
		'user_id' => 'int',
		'lat' => 'float',
		'lng' => 'float',
		'city_id' => 'int',
		'district_id' => 'int',
		'is_default' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'label',
		'detail',
		'lat',
		'lng',
		'city_id',
		'district_id',
		'is_default'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class);
	}
}
