<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NotificationDatum
 * 
 * @property int $id
 * @property int $notification_id
 * @property string|null $data_key
 * @property string|null $data_value
 * 
 * @property Notification $notification
 *
 * @package App\Models
 */
class NotificationDatum extends Model
{
	protected $table = 'notification_data';
	public $timestamps = false;

	protected $casts = [
		'notification_id' => 'int'
	];

	protected $fillable = [
		'notification_id',
		'data_key',
		'data_value'
	];

	public function notification()
	{
		return $this->belongsTo(Notification::class);
	}
}
