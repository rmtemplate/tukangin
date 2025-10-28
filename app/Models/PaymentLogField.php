<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentLogField
 * 
 * @property int $id
 * @property int $payment_log_id
 * @property string|null $field_key
 * @property string|null $field_value
 * 
 * @property PaymentLog $payment_log
 *
 * @package App\Models
 */
class PaymentLogField extends Model
{
	protected $table = 'payment_log_fields';
	public $timestamps = false;

	protected $casts = [
		'payment_log_id' => 'int'
	];

	protected $fillable = [
		'payment_log_id',
		'field_key',
		'field_value'
	];

	public function payment_log()
	{
		return $this->belongsTo(PaymentLog::class);
	}
}
