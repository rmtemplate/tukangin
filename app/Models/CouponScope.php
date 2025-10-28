<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponScope
 * 
 * @property int $id
 * @property int $coupon_id
 * @property string|null $scope
 * @property int $ref_id
 * 
 * @property Coupon $coupon
 *
 * @package App\Models
 */
class CouponScope extends Model
{
	protected $table = 'coupon_scopes';
	public $timestamps = false;

	protected $casts = [
		'coupon_id' => 'int',
		'ref_id' => 'int'
	];

	protected $fillable = [
		'coupon_id',
		'scope',
		'ref_id'
	];

	public function coupon()
	{
		return $this->belongsTo(Coupon::class);
	}
}
