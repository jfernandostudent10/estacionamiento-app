<div>
    <x-modal-dialog class="modal-xl" :modalName="$modalName" :modalTitle="$modalTitle">
        <x-slot name="modalBody">
            <form wire:submit="save" id="form-">
                <div class="row g-3">

                    <div class="col-md-6">
                        <x-input-text label="Buscar Usuario" wire:model="user"/>
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