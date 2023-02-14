<div data-bs-theme="dark">
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <x-modal>
            <x-slot name="header">
                <h5 class="modal-title">New User</h5>
                <button type="button" class="btn-close" aria-label="Close" wire:click="$emitSelf('close')"
                    data-bs-dismiss="modal"></button>
            </x-slot>
            <div class="p-6">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('user.name') is-invalid @enderror" id="name"
                        placeholder="Enter Name" wire:model.lazy="user.name">
                    @error('user.name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control @error('user.email') is-invalid @enderror" id="email"
                        placeholder="Enter E-mail" wire:model.lazy="user.email">
                    @error('user.email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group d-flex flex-column mb-3">
                    Avatar Preview:
                    <img src="{{ $avatarsDir . $previewPath }}" class="img-thumbnail w-25">
                    <label for="upload">Avatar:</label>
                    <input type="file" class="form-control @error('upload') is-invalid @enderror" id="upload"
                        wire:model.lazy="upload">
                    @error('upload')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-group mb-3">
                    <label for="tel">Tel:</label>
                    <input type="text" class="form-control @error('user.profile.tel') is-invalid @enderror"
                        id="tel" placeholder="Enter telephone number" wire:model.lazy="user.profile.tel">
                    @error('user.profile.tel')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <x-slot name="footer">
                <button type="button" class="btn btn-secondary" wire:click="$emitSelf('close')"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </x-slot>
        </x-modal>
    </form>
</div>
