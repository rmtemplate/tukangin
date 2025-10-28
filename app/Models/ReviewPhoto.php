<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReviewPhoto
 * 
 * @property int $id
 * @property int $review_id
 * @property int $file_id
 * @property Carbon|null $created_at
 * 
 * @property Review $review
 * @property File $file
 *
 * @package App\Models
 */
class ReviewPhoto extends Model
{
	protected $table = 'review_photos';
	public $timestamps = false;

	protected $casts = [
		'review_id' => 'int',
		'file_id' => 'int'
	];

	protected $fillable = [
		'review_id',
		'file_id'
	];

	public function review()
	{
		return $this->belongsTo(Review::class);
	}

	public function file()
	{
		return $this->belongsTo(File::class);
	}
}
