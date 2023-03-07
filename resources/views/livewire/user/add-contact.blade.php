<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Contacts</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="add" action="#">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input wire:model.defer="name" type="tel" class="form-control" placeholder="Enter name"
                            name="name">
                        @error('name') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input wire:model.defer="phone" type="tel" class="form-control" placeholder="Enter phone number"
                            name="phone">
                        @error('phone') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag</label>
                        <select wire:model.lazy="tags" class="form-control" name="tags" multiple>
                            @forelse ($tag_list as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                            <option value="0">- No tags -</option>
                            @endforelse
                        </select>
                        @error('tags') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check mt-3">
                            <label class="form-check-label">
                                <input wire:model.defer="stay" class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                                Stay on this page
                            </label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href="{{ route('contact') }}" class="btn btn-secondary">Back</a>
                    </div>
                    <div wire:loading wire:target="add">
                        <p>Creating...</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>