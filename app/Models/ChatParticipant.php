<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatParticipant
 * 
 * @property int $id
 * @property int $thread_id
 * @property int $user_id
 * @property Carbon|null $last_read_at
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * 
 * @property ChatThread $chat_thread
 *
 * @package App\Models
 */
class ChatParticipant extends Model
{
	protected $table = 'chat_participants';
	public $timestamps = false;

	protected $casts = [
		'thread_id' => 'int',
		'user_id' => 'int',
		'last_read_at' => 'datetime',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'thread_id',
		'user_id',
		'last_read_at',
		'is_active'
	];

	public function chat_thread()
	{
		return $this->belongsTo(ChatThread::class, 'thread_id');
	}
}
