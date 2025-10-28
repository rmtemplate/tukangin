<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthOtp
 * 
 * @property int $id
 * @property string $phone
 * @property string $code
 * @property Carbon|null $expires_at
 * @property int|null $attempts
 * @property Carbon|null $used_at
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class AuthOtp extends Model
{
	protected $table = 'auth_otps';
	public $timestamps = false;

	protected $casts = [
		'expires_at' => 'datetime',
		'attempts' => 'int',
		'used_at' => 'datetime'
	];

	protected $fillable = [
		'phone',
		'code',
		'expires_at',
		'attempts',
		'used_at'
	];
}
