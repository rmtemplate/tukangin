<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $body
 * @property string|null $sent_via
 * @property Carbon|null $delivered_at
 * @property Carbon|null $read_at
 * @property Carbon|null $created_at
 * 
 * @property Collection|NotificationDatum[] $notification_data
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'delivered_at' => 'datetime',
		'read_at' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'title',
		'body',
		'sent_via',
		'delivered_at',
		'read_at'
	];

	public function notification_data()
	{
		return $this->hasMany(NotificationDatum::class);
	}
}
