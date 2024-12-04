<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ParkingReserved
 * 
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_id
 * @property int $parking_site_id
 * @property Carbon $start_time
 * @property Carbon|null $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ParkingSite $parking_site
 * @property User $user
 * @property Vehicle $vehicle
 *
 * @package App\Models
 */
class ParkingReserved extends Model
{
	protected $table = 'parking_reserved';

	protected $casts = [
		'user_id' => 'int',
		'vehicle_id' => 'int',
		'parking_site_id' => 'int',
		'start_time' => 'datetime',
		'end_time' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'vehicle_id',
		'parking_site_id',
		'start_time',
		'end_time'
	];



	public function parking_site()
	{
		return $this->belongsTo(ParkingSite::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);
	}
}
