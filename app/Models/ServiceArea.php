<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceArea
 * 
 * @property int $id
 * @property int $district_id
 * @property bool|null $active
 * @property float|null $visit_fee
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property District $district
 *
 * @package App\Models
 */
class ServiceArea extends Model
{
	protected $table = 'service_areas';

	protected $casts = [
		'district_id' => 'int',
		'active' => 'bool',
		'visit_fee' => 'float'
	];

	protected $fillable = [
		'district_id',
		'active',
		'visit_fee'
	];

	public function district()
	{
		return $this->belongsTo(District::class);
	}
}
