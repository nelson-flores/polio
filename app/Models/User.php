<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as AuthUser;

/**
 * Class User
 * 
 * @property int $id
 * @property string|null $name
 * @property string $username
 * @property string|null $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Counter[] $counters
 *
 * @package App\Models
 */
class User extends AuthUser
{
	use SoftDeletes;
	protected $table = 'users';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'username',
		'password'
	];

	public function counters()
	{
		return $this->hasMany(Counter::class);
	}
}
