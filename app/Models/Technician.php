<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Technician
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $phone
 * @property float|null $rating
 * @property bool|null $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|BookingAssignment[] $booking_assignments
 * @property Collection|TechLocation[] $tech_locations
 * @property Collection|TechShift[] $tech_shifts
 * @property Collection|TechSkill[] $tech_skills
 * @property Collection|TechTimeOff[] $tech_time_offs
 * @property Collection|TechnicianArea[] $technician_areas
 *
 * @package App\Models
 */
class Technician extends Model
{
	protected $table = 'technicians';

	protected $casts = [
		'user_id' => 'int',
		'rating' => 'float',
		'active' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'name',
		'phone',
		'rating',
		'active'
	];

	public function booking_assignments()
	{
		return $this->hasMany(BookingAssignment::class);
	}

	public function tech_locations()
	{
		return $this->hasMany(TechLocation::class);
	}

	public function tech_shifts()
	{
		return $this->hasMany(TechShift::class);
	}

	public function tech_skills()
	{
		return $this->hasMany(TechSkill::class);
	}

	public function tech_time_offs()
	{
		return $this->hasMany(TechTimeOff::class);
	}

	public function technician_areas()
	{
		return $this->hasMany(TechnicianArea::class);
	}
}
