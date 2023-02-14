<style>
</style>

<div wire:ignore.self id="bsModal" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-keyboard="false"
    data-bs-backdrop="static">
    {{-- @if ($this->getPropertyValue('edit'))
        @include('livewire.edit')
    @endif --}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{ $header }}
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var bsModal = new bootstrap.Modal('#bsModal');

        window.addEventListener('hidden.bs.modal', (e) => {
            document.body.querySelector('#bsModal .modal-body').innerHTML = '';
        });
        window.addEventListener('openModal', (e) => {
            console.log('openModal event --------', e.detail);
            bsModal.show();
        });
        window.addEventListener('closeModal', (e) => {
            console.log('closeModal event --------', e.detail);
            bsModal.hide();
        });
        window.addEventListener('itemStored', (e) => {
            console.log('itemStored event --------', e.detail);
            bsModal.hide();
            Toastify({
                text: "Item saved !",
                duration: 3000,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
            }).showToast();
            Livewire.emitTo('users-table', 'refreshDatatable');
        });
        window.addEventListener('itemUpdated', (e) => {
            console.log('itemUpdated event --------', e.detail);
            bsModal.hide();
            Toastify({
                text: "Item updated !",
                duration: 3000,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
            }).showToast();
            Livewire.emitTo('users-table', 'refreshDatatable');
        });
        window.addEventListener('itemDeleted', (e) => {
            console.log('itemDeleted event --------', e.detail);
            Toastify({
                text: "Item deleted !",
                duration: 3000,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
            }).showToast();
            Livewire.emitTo('users-table', 'refreshDatatable');
        });
        window.addEventListener('error', (e) => {
            console.log('error event --------', e.detail);
        });
    });
</script>
