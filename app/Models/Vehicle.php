<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    use HasFactory;
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

    // boot method
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            $vehicle->application_date = Carbon::now();
            $vehicle->user_id = auth()->id();
        });
    }

    /*public function getDisabledPersonAttribute($value)
    {
        return $value ? 'Si' : 'No';
    }*/

    public function getDisabledPersonLabel()
    {
        return $this->disabled_person ? 'Si' : 'No';
    }

    public function getHasConadisDistinctiveLabel()
    {
        return $this->has_conadis_distinctive ? 'Si' : 'No';
    }

    public function getApplicationDateAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getIsApprovedLabel()
    {
        return $this->is_approved ? 'Si' : 'No';
    }

    public function getApprovedByLabel()
    {
        return $this->approved_by ? User::find($this->approved_by)->name : '-';
    }

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function parking_reserveds()
	{
		return $this->hasMany(ParkingReserved::class);
	}
}
