@props([
    'required' => true,
    'label' => null,
    'readonly' => false,
    'disabled' => false,
    'help' => "",
    'options' => [],
    'selected' => null,
    'multiple' => false,
    'id' => 'select2-' . uniqid(),
    'tag' => false
])


@php
    if (!is_array($options)) {
        abort(422 , '$options is not an array');
    }
@endphp
<div>

    @if($label)
        <x-label for="{{ $id }}" :value="$label" :required="$required" />
    @endif

    <div wire:ignore>
        <div class="select-2-parent-{{ $id }}">
            <select {{ $attributes }} id="{{ $id }}" class="form-control"
                    @if($multiple) multiple @endif @if($disabled) disabled @endif>
                @if(!$multiple)
                    <option value="" selected>-- {{ __('lang.select') }} --</option>
                @endif
                @foreach($options as $key => $option)
                    <option value="{{ $key }}"
                            @if(($multiple && is_array($selected) && in_array($key, $selected)) || ($key == $selected)) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if($attributes->whereStartsWith('wire:model')->first())
        <x-input-error for="{{ $attributes->whereStartsWith('wire:model')->first() }}" class="mt-2" />
    @endif

    @pushonce('styles')
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <!-- Or for RTL support -->
        {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />--}}
        <style>
            .select2-container, .select2-dropdown, .select2-search, .select2-results {
                -webkit-transition: none !important;
                -moz-transition: none !important;
                -ms-transition: none !important;
                -o-transition: none !important;
                transition: none !important;
            }

            [class^="select-2-parent-"] .selection {
                width: 100%;
                overflow: hidden;
            }

            [class^="select-2-parent-"] .select2-selection {
                min-height: 44px !important;
            }

            [class^="select-2-parent-"] .select2-container {
                display: grid !important;
            }

            /* Change the appearence of the bakground colour surrounding the search input field */
            .select2-search {
                background-color: var(--white) !important;
            }

            /* Change the appearence of the search input field */
            .select2-search input {
                color: var(--text-primary-light) !important;
                background-color: var(--white) !important;
            }

            /* Change the appearence of the search results container */
            .select2-results {
                background-color: var(--white) !important;
            }

            /* Change the appearence of the dropdown select container */
            .select2-container--bootstrap-5 .select2-selection {
                border-color: var(--input-form-light) !important;
                color: var(--text-primary-light) !important;
                background-color: var(--white) !important;
            }

            /* Change the caret down arrow symbol to white */
            html[data-theme="dark"] .select2-container--bootstrap-5 .select2-selection--single {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") !important;
            }

            html[data-theme="dark"] .select2-container--bootstrap-5 .select2-dropdown {
                color: var(--text-primary-light) !important;
            }

            /* Change the color of the default selected item i.e. the first option */
            .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
                color: var(--text-primary-light) !important;
            }

            .select2-container--bootstrap-5 .select2-dropdown .select2-search .select2-search__field {
                color: var(--text-primary-light) !important;
            }

            html[data-theme="dark"] .select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option.select2-results__message {
                color: #FFFFFF;
            }

            /* tags */
            .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
                color: var(--text-primary-light) !important;
            }
        </style>
    @endpushonce

    @pushonce('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            function initSelect2(id, tag = false) {
                $('#' + id).select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('.select-2-parent-' + id),
                    tags: tag,
                    width: '100%',
                    sorter: data => data.sort((a, b) => a.text.toLowerCase() > b.text.toLowerCase() ? 0 : -1)

                })
            }

            function setSelected(event, element) {
                if (event.selected !== null && event.selected !== undefined) {
                    element.val(event.selected).trigger('change');
                }
            }

            function setChangeModel(event) {
                if (event.id && event.model) {
                    const element = $('#' + event.id);
                    element.on('change', function (e) {
                    @this.set(event.model, $(this).val());
                    });
                }
            }

            function setElements(event) {
                const element = $('#' + event.id);
                const options = event.options ?? {};
                element.empty();
                if (event.multiple !== undefined && !event.multiple) {
                    element.append(new Option('-- {{ __('lang.select') }} --', '', true, true));
                }
                for (const key in options) {
                    const selected = event.selected !== undefined && (String(event.selected) === String(key) || (Array.isArray(event.selected) && event.selected.includes(key)));
                    element.append(new Option(options[key], key, false, selected));
                }
            }

            document.addEventListener('livewire:initialized', () => {
                Livewire.on('update-select2-options', event => {
                    setElements(event);
                });

                Livewire.on('set-select2', event => {
                    const element = $('#' + event.id);
                    setSelected(event, element);
                });


                Livewire.on('reset-select2', event => {
                    const interval = setInterval(() => {
                        const element = $('#' + event.id);
                        if (element.length) {
                            initSelect2(event.id);
                            setElements(event);
                            setChangeModel(event);
                            clearInterval(interval);
                        }
                    }, 100);
                });
            });
        </script>
    @endpushonce

    @push('scripts')
        <script>
            $(function () {
                initSelect2('{{ $id }}', {{ $tag ? 'true' : 'false' }})
                @if($attributes->whereStartsWith('wire:model')->first())

                $('#' + '{{ $id }}').on('change', function (e) {
                @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', $(this).val());
                });

                @endif
            })
        </script>
    @endpush
</div>