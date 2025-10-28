<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Coupon
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $type
 * @property float $value
 * @property int|null $max_uses
 * @property float|null $min_spend
 * @property Carbon|null $valid_from
 * @property Carbon|null $valid_to
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|CouponRedemption[] $coupon_redemptions
 * @property Collection|CouponScope[] $coupon_scopes
 *
 * @package App\Models
 */
class Coupon extends Model
{
	protected $table = 'coupons';

	protected $casts = [
		'value' => 'float',
		'max_uses' => 'int',
		'min_spend' => 'float',
		'valid_from' => 'datetime',
		'valid_to' => 'datetime',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'code',
		'type',
		'value',
		'max_uses',
		'min_spend',
		'valid_from',
		'valid_to',
		'is_active'
	];

	public function coupon_redemptions()
	{
		return $this->hasMany(CouponRedemption::class);
	}

	public function coupon_scopes()
	{
		return $this->hasMany(CouponScope::class);
	}
}
