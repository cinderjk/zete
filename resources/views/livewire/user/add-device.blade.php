<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Device</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="add" action="#">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input wire:model.defer="name" type="text" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input wire:model.defer="description" type="text" class="form-control"
                            placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="legacy">WhatsApp Type</label>
                        <select wire:model.defer="legacy" class="form-control">
                            <option value="0">WhatsApp Multi-device</option>
                            <option value="1">WhatsApp Legacy</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Device</button>
                        <a href="{{ route('device') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>