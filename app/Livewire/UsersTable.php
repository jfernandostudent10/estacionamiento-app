<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;
    public $role;

    public function mount($role)
    {
        $this->role = $role;

        if (!in_array($role, User::ROLES)) {
            abort(404);
        }
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            /*Column::make("Id", "id")
                ->sortable(),*/
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable()->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return User::query()//->where('role', $this->role)
            ->whereHas('roles', function ($query) {
                $query->where('name', $this->role);
            })
            ;
    }
}
