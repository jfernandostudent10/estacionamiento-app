<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ParkingSite
 * 
 * @property int $id
 * @property int $number
 * @property Carbon $date
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ParkingReserved[] $parking_reserveds
 *
 * @package App\Models
 */
class ParkingSite extends Model
{
	protected $table = 'parking_sites';

	protected $casts = [
		'number' => 'int',
		'date' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'number',
		'date',
		'status'
	];

	public function parking_reserveds()
	{
		return $this->hasMany(ParkingReserved::class);
	}
}
