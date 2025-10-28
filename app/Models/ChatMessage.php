<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatMessage
 * 
 * @property int $id
 * @property int $thread_id
 * @property int $sender_user_id
 * @property string|null $type
 * @property string|null $text
 * @property Carbon|null $created_at
 * @property Carbon|null $delivered_at
 * @property Carbon|null $read_at
 * 
 * @property ChatThread $chat_thread
 * @property Collection|MessageAttachment[] $message_attachments
 *
 * @package App\Models
 */
class ChatMessage extends Model
{
	protected $table = 'chat_messages';
	public $timestamps = false;

	protected $casts = [
		'thread_id' => 'int',
		'sender_user_id' => 'int',
		'delivered_at' => 'datetime',
		'read_at' => 'datetime'
	];

	protected $fillable = [
		'thread_id',
		'sender_user_id',
		'type',
		'text',
		'delivered_at',
		'read_at'
	];

	public function chat_thread()
	{
		return $this->belongsTo(ChatThread::class, 'thread_id');
	}

	public function message_attachments()
	{
		return $this->hasMany(MessageAttachment::class, 'message_id');
	}
}
