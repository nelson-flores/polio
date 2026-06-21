<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Counter
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property int|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Counter extends Model
{
	use SoftDeletes;
	protected $table = 'counter';

	protected $casts = [
		'user_id' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'value',
		'tag'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
