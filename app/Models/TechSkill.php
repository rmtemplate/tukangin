<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TechSkill
 * 
 * @property int $id
 * @property int $technician_id
 * @property int $service_id
 * @property int|null $level
 * @property Carbon|null $created_at
 * 
 * @property Technician $technician
 * @property Service $service
 *
 * @package App\Models
 */
class TechSkill extends Model
{
	protected $table = 'tech_skills';
	public $timestamps = false;

	protected $casts = [
		'technician_id' => 'int',
		'service_id' => 'int',
		'level' => 'int'
	];

	protected $fillable = [
		'technician_id',
		'service_id',
		'level'
	];

	public function technician()
	{
		return $this->belongsTo(Technician::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
