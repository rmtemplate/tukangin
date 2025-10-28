<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $user_id
 * @property int|null $rating
 * @property string|null $comment
 * @property Carbon|null $created_at
 * 
 * @property Booking $booking
 * @property Collection|ReviewPhoto[] $review_photos
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'reviews';
	public $timestamps = false;

	protected $casts = [
		'booking_id' => 'int',
		'user_id' => 'int',
		'rating' => 'int'
	];

	protected $fillable = [
		'booking_id',
		'user_id',
		'rating',
		'comment'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function review_photos()
	{
		return $this->hasMany(ReviewPhoto::class);
	}
}
