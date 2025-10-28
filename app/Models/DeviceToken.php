<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeviceToken
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $platform
 * @property string|null $token
 * @property Carbon|null $created_at
 * @property Carbon|null $revoked_at
 *
 * @package App\Models
 */
class DeviceToken extends Model
{
	protected $table = 'device_tokens';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'revoked_at' => 'datetime'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'user_id',
		'platform',
		'token',
		'revoked_at'
	];
}
