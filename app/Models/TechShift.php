<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TechShift
 * 
 * @property int $id
 * @property int $technician_id
 * @property int|null $weekday
 * @property Carbon|null $start_time
 * @property Carbon|null $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Technician $technician
 *
 * @package App\Models
 */
class TechShift extends Model
{
	protected $table = 'tech_shifts';

	protected $casts = [
		'technician_id' => 'int',
		'weekday' => 'int',
		'start_time' => 'datetime',
		'end_time' => 'datetime'
	];

	protected $fillable = [
		'technician_id',
		'weekday',
		'start_time',
		'end_time'
	];

	public function technician()
	{
		return $this->belongsTo(Technician::class);
	}
}
