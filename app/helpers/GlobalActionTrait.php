<?php

namespace App\helpers;

trait GlobalActionTrait
{

    public function globalShowModal($modalName): void
    {
        $this->globalDispatchModal($modalName, 'show');
    }

    public function globalHideModal($modalName): void
    {
        $this->globalDispatchModal($modalName);
    }

    public function globalDispatchModal($modalName, $action = 'hide'): void
    {
        $this->dispatch('global-dispatch-modal', modal: $modalName, action: $action);
    }
}