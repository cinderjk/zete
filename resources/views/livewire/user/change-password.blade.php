<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Password</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save" action="#">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input wire:model.defer="current_password" type="password" class="form-control"
                            placeholder="Enter current password">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input wire:model.defer="password" type="password" class="form-control"
                            placeholder="Enter new password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input wire:model.defer="password_confirmation" type="password" class="form-control"
                            placeholder="Enter password confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- @push('scripts')

    @endpush --}}
</div>