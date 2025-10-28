<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * 
 * @property int $id
 * @property string|null $storage_key
 * @property string|null $url
 * @property string|null $mime_type
 * @property int|null $size_bytes
 * @property int|null $width
 * @property int|null $height
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * 
 * @property Collection|MessageAttachment[] $message_attachments
 * @property Collection|ReviewPhoto[] $review_photos
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';
	public $timestamps = false;

	protected $casts = [
		'size_bytes' => 'int',
		'width' => 'int',
		'height' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'storage_key',
		'url',
		'mime_type',
		'size_bytes',
		'width',
		'height',
		'created_by'
	];

	public function message_attachments()
	{
		return $this->hasMany(MessageAttachment::class);
	}

	public function review_photos()
	{
		return $this->hasMany(ReviewPhoto::class);
	}
}
