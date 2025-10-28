<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property int $category_id
 * @property string|null $sku
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $description
 * @property float|null $base_price
 * @property string|null $unit
 * @property int|null $est_duration_min
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property Collection|BookingItem[] $booking_items
 * @property Collection|ServiceAddon[] $service_addons
 * @property Collection|TechSkill[] $tech_skills
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';

	protected $casts = [
		'category_id' => 'int',
		'base_price' => 'float',
		'est_duration_min' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'category_id',
		'sku',
		'name',
		'slug',
		'description',
		'base_price',
		'unit',
		'est_duration_min',
		'is_active'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function booking_items()
	{
		return $this->hasMany(BookingItem::class);
	}

	public function service_addons()
	{
		return $this->hasMany(ServiceAddon::class);
	}

	public function tech_skills()
	{
		return $this->hasMany(TechSkill::class);
	}
}
