<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $id
 * @property int $booking_id
 * @property int|null $invoice_id
 * @property float $amount
 * @property string|null $method
 * @property string|null $status
 * @property Carbon|null $paid_at
 * @property string|null $ref
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking $booking
 * @property Invoice|null $invoice
 * @property Collection|PaymentLog[] $payment_logs
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';

	protected $casts = [
		'booking_id' => 'int',
		'invoice_id' => 'int',
		'amount' => 'float',
		'paid_at' => 'datetime'
	];

	protected $fillable = [
		'booking_id',
		'invoice_id',
		'amount',
		'method',
		'status',
		'paid_at',
		'ref'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}

	public function payment_logs()
	{
		return $this->hasMany(PaymentLog::class);
	}
}
