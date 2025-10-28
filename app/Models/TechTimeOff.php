<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TechTimeOff
 * 
 * @property int $id
 * @property int $technician_id
 * @property Carbon|null $starts_at
 * @property Carbon|null $ends_at
 * @property string|null $reason
 * @property Carbon|null $created_at
 * 
 * @property Technician $technician
 *
 * @package App\Models
 */
class TechTimeOff extends Model
{
	protected $table = 'tech_time_off';
	public $timestamps = false;

	protected $casts = [
		'technician_id' => 'int',
		'starts_at' => 'datetime',
		'ends_at' => 'datetime'
	];

	protected $fillable = [
		'technician_id',
		'starts_at',
		'ends_at',
		'reason'
	];

	public function technician()
	{
		return $this->belongsTo(Technician::class);
	}
}
