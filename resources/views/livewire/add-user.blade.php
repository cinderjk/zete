<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add User</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save" action="#">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input wire:model.defer="name" type="text" class="form-control" placeholder="Enter User name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input wire:model.defer="name" type="email" class="form-control" placeholder="Enter User Email">
                    </div>
                    <div class="form-group">
                        <label for="api_key">Password</label>
                        <input wire:model.defer="api_key" type="password" onfocusin="(this.type='text')"
                            onfocusout="(this.type='password')" class="form-control" placeholder="Enter User Password">
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