<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserSession
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $refresh_token
 * @property string|null $user_agent
 * @property string|null $last_ip
 * @property Carbon|null $last_seen_at
 * @property Carbon|null $revoked_at
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class UserSession extends Model
{
	protected $table = 'user_sessions';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'last_seen_at' => 'datetime',
		'revoked_at' => 'datetime'
	];

	protected $hidden = [
		'refresh_token'
	];

	protected $fillable = [
		'user_id',
		'refresh_token',
		'user_agent',
		'last_ip',
		'last_seen_at',
		'revoked_at'
	];
}
