<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property int $booking_id
 * @property string|null $number
 * @property string|null $status
 * @property float $amount_due
 * @property float|null $amount_paid
 * @property Carbon|null $issued_at
 * @property Carbon|null $due_at
 * @property Carbon|null $paid_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking $booking
 * @property Collection|Payment[] $payments
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';

	protected $casts = [
		'booking_id' => 'int',
		'amount_due' => 'float',
		'amount_paid' => 'float',
		'issued_at' => 'datetime',
		'due_at' => 'datetime',
		'paid_at' => 'datetime'
	];

	protected $fillable = [
		'booking_id',
		'number',
		'status',
		'amount_due',
		'amount_paid',
		'issued_at',
		'due_at',
		'paid_at'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}
}
