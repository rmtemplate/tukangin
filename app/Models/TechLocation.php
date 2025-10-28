<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TechLocation
 * 
 * @property int $id
 * @property int $technician_id
 * @property float|null $lat
 * @property float|null $lng
 * @property Carbon|null $recorded_at
 * 
 * @property Technician $technician
 *
 * @package App\Models
 */
class TechLocation extends Model
{
	protected $table = 'tech_locations';
	public $timestamps = false;

	protected $casts = [
		'technician_id' => 'int',
		'lat' => 'float',
		'lng' => 'float',
		'recorded_at' => 'datetime'
	];

	protected $fillable = [
		'technician_id',
		'lat',
		'lng',
		'recorded_at'
	];

	public function technician()
	{
		return $this->belongsTo(Technician::class);
	}
}
