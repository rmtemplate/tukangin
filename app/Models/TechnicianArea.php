<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TechnicianArea
 * 
 * @property int $id
 * @property int $technician_id
 * @property int $district_id
 * @property Carbon|null $created_at
 * 
 * @property Technician $technician
 * @property District $district
 *
 * @package App\Models
 */
class TechnicianArea extends Model
{
	protected $table = 'technician_areas';
	public $timestamps = false;

	protected $casts = [
		'technician_id' => 'int',
		'district_id' => 'int'
	];

	protected $fillable = [
		'technician_id',
		'district_id'
	];

	public function technician()
	{
		return $this->belongsTo(Technician::class);
	}

	public function district()
	{
		return $this->belongsTo(District::class);
	}
}
