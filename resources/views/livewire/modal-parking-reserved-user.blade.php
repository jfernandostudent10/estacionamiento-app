<div>
    <x-modal-dialog :modalName="$modalName" :modalTitle="$modalTitle">
        <x-slot name="modalBody">
            <form wire:submit="save" id="form-">
                <div class="row g-3">

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" wire:model="userCode">
                            <button class="btn btn-outline-secondary" wire:click="searchUser" type="button" id="button-addon2">Buscar Usuario</button>
                        </div>
                    </div>

                    <div class="col-12">
                        <x-input-text label="Usuario" readonly=""  value="{{ $userName }}"/>
                    </div>

                </div>
            </form>
        </x-slot>

        <x-slot name="modalFooter">
            <x-button-cancel/>
            <x-button-save form="form-"/>
        </x-slot>
    </x-modal-dialog>
</div>