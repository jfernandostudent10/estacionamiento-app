<!-- Vendor Scripts Start -->
<script src="{{ asset('js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/vendor/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/vendor/autoComplete.min.js') }}"></script>
<script src="{{ asset('js/vendor/clamp.min.js') }}"></script>
<script src="{{ asset('icon/acorn-icons.js') }}"></script>
<script src="{{ asset('icon/acorn-icons-interface.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@yield('js_vendor')
<!-- Vendor Scripts End -->
<!-- Template Base Scripts Start -->
<script src="{{ asset('js/base/helpers.js') }}"></script>
<script src="{{ asset('js/base/globals.js') }}"></script>
<script src="{{ asset('js/base/nav.js') }}"></script>
<script src="{{ asset('js/base/settings.js') }}"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->
@yield('js_page')
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- Page Specific Scripts End -->

@stack('modals')
@livewireScripts
<script>
    Livewire.on('global-dispatch-modal', (event) => {
        const globalModal = $('#' + event.modal)
        if (globalModal.length) {
            globalModal.modal(event.action)
        }
    });
</script>