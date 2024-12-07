<x-app-layout>

    <x-slot name="title">
        {{ __('lang.list_'. $role) }}
    </x-slot>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('lang.list_'. $role) }}
                            </span>

                            <div class="float-right">

                            </div>
                        </div>
                    </div>


                    <div class="card-body bg-white">
                        <livewire:users-table role="{{ $role }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-layouts.app>