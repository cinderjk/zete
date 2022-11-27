<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Device</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save" action="#">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input wire:model.defer="name" type="text" class="form-control" placeholder="Enter name" name="device_name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input wire:model.defer="description" type="text" class="form-control"
                            placeholder="Enter description" name="device_description">
                    </div>
                    <div class="form-group">
                        <label for="legacy">WhatsApp Type</label>
                        <select wire:model.defer="legacy" class="form-control" name="device_type">
                            <option value="0">WhatsApp Multi-device</option>
                            <option value="1">WhatsApp Legacy</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Save Device</button>
                        <a href="{{ route('device') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>