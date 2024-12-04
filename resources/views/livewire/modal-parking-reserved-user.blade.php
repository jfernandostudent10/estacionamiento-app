<div>
    <x-modal-dialog :modalName="$modalName" :modalTitle="$modalTitle">
        <x-slot name="modalBody">
            <form wire:submit="store" id="form-modal-parking-reserved-user">
                <div class="row g-3">

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" wire:model="userCode">
                            <button class="btn btn-outline-secondary" wire:click="searchUser" wire:target="searchUser" type="button" id="button-addon2">Buscar Usuario</button>
                        </div>
                        <x-input-error for="userCode"/>
                        <x-input-error for="user_id"/>

                    </div>

                    <div class="col-12">
                        <x-input-text label="Usuario" readonly=""  value="{{ $userName }}"/>
                    </div>

                    @if($vehicles)
                        <div class="col-12">
                            <x-select label="Vehículos" wire:model="vehicle_id" :options="$vehicles"/>
                        </div>
                    @endif
                </div>
            </form>
        </x-slot>

        <x-slot name="modalFooter">
            <x-button-cancel text="Cancelar"/>
            <x-button form="form-modal-parking-reserved-user">
                Guardar
            </x-button>
        </x-slot>
    </x-modal-dialog>
</div>