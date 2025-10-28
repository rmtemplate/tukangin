<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentLog
 * 
 * @property int $id
 * @property int $payment_id
 * @property string|null $provider
 * @property string|null $event
 * @property string|null $status_code
 * @property string|null $reference
 * @property Carbon|null $created_at
 * 
 * @property Payment $payment
 * @property Collection|PaymentLogField[] $payment_log_fields
 *
 * @package App\Models
 */
class PaymentLog extends Model
{
	protected $table = 'payment_logs';
	public $timestamps = false;

	protected $casts = [
		'payment_id' => 'int'
	];

	protected $fillable = [
		'payment_id',
		'provider',
		'event',
		'status_code',
		'reference'
	];

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}

	public function payment_log_fields()
	{
		return $this->hasMany(PaymentLogField::class);
	}
}
