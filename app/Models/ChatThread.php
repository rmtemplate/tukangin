<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatThread
 * 
 * @property int $id
 * @property string|null $scope
 * @property int|null $booking_id
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking|null $booking
 * @property Collection|ChatMessage[] $chat_messages
 * @property Collection|ChatParticipant[] $chat_participants
 *
 * @package App\Models
 */
class ChatThread extends Model
{
	protected $table = 'chat_threads';

	protected $casts = [
		'booking_id' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'scope',
		'booking_id',
		'created_by'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function chat_messages()
	{
		return $this->hasMany(ChatMessage::class, 'thread_id');
	}

	public function chat_participants()
	{
		return $this->hasMany(ChatParticipant::class, 'thread_id');
	}
}
