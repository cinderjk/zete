<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save" action="#">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input wire:model.defer="name" type="text" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="api_key">Api Key</label>
                        <input wire:model.defer="api_key" type="password" onfocusin="(this.type='text')"
                            onfocusout="(this.type='password')" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button wire:click.prevent="regenerateApi" type="button" class="btn btn-secondary">Re-generate
                            Api</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- @push('scripts')

    @endpush --}}
</div>