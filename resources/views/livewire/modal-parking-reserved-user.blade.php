<div>
    <x-modal-dialog :modalName="$modalName" :modalTitle="$modalTitle">
        <x-slot name="modalBody">
            <form wire:submit="{{ $this->parkingSite->status ? 'unlockSite' : 'lockSite' }}" id="form-modal-parking-reserved-user">
                <div class="row g-3">

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" wire:model="userCode" {{ $this->parkingSite->status ? 'readonly' : '' }}>
                            <button class="btn btn-outline-secondary" {{ $this->parkingSite->status ? 'disabled' : '' }}  wire:click="searchUser" wire:target="searchUser" type="button" id="button-addon2">Buscar Usuario</button>
                        </div>
                        <x-input-error for="userCode"/>
                        <x-input-error for="user_id"/>

                    </div>

                    <div class="col-12">
                        <x-input-text label="Usuario" readonly=""  value="{{ $userName }}" />
                    </div>

                    @if($vehicles)
                        <div class="col-12">
                            <x-select label="Vehículos" wire:model="vehicle_id" :options="$vehicles" :disabled="$this->parkingSite->status"  />
                        </div>
                    @endif
                </div>
            </form>
        </x-slot>

        <x-slot name="modalFooter">
            <x-button-cancel text="Cancelar"/>
            <x-button form="form-modal-parking-reserved-user">
                {{ $this->parkingSite->status ? 'Liberar' : 'Ocupar' }}
            </x-button>
        </x-slot>
    </x-modal-dialog>
</div>