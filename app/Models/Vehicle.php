<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 * 
 * @property int $id
 * @property string $vehicle_type
 * @property string $plate
 * @property bool $disabled_person
 * @property bool $has_conadis_distinctive
 * @property Carbon $application_date
 * @property bool $is_approved
 * @property int|null $approved_by
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|ParkingReserved[] $parking_reserveds
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	protected $table = 'vehicles';

	protected $casts = [
		'disabled_person' => 'bool',
		'has_conadis_distinctive' => 'bool',
		'application_date' => 'datetime',
		'is_approved' => 'bool',
		'approved_by' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'vehicle_type',
		'plate',
		'disabled_person',
		'has_conadis_distinctive',
		'application_date',
		'is_approved',
		'approved_by',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function parking_reserveds()
	{
		return $this->hasMany(ParkingReserved::class);
	}
}
