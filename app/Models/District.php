<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 * 
 * @property int $id
 * @property int $city_id
 * @property string|null $name
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City $city
 * @property Collection|Address[] $addresses
 * @property ServiceArea|null $service_area
 * @property Collection|TechnicianArea[] $technician_areas
 *
 * @package App\Models
 */
class District extends Model
{
	protected $table = 'districts';

	protected $casts = [
		'city_id' => 'int'
	];

	protected $fillable = [
		'city_id',
		'name',
		'slug'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function addresses()
	{
		return $this->hasMany(Address::class);
	}

	public function service_area()
	{
		return $this->hasOne(ServiceArea::class);
	}

	public function technician_areas()
	{
		return $this->hasMany(TechnicianArea::class);
	}
}
