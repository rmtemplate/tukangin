<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessageAttachment
 * 
 * @property int $id
 * @property int $message_id
 * @property int $file_id
 * @property Carbon|null $created_at
 * 
 * @property ChatMessage $chat_message
 * @property File $file
 *
 * @package App\Models
 */
class MessageAttachment extends Model
{
	protected $table = 'message_attachments';
	public $timestamps = false;

	protected $casts = [
		'message_id' => 'int',
		'file_id' => 'int'
	];

	protected $fillable = [
		'message_id',
		'file_id'
	];

	public function chat_message()
	{
		return $this->belongsTo(ChatMessage::class, 'message_id');
	}

	public function file()
	{
		return $this->belongsTo(File::class);
	}
}
