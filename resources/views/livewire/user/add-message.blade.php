<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Message</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="add" action="#">
                    <div class="form-group">
                        <label for="device_id">Device</label>
                        <select wire:model.lazy="device_id" class="form-control" name="device_id">
                            @forelse ($devices as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                            <option value="0">- No device found -</option>
                            @endforelse
                        </select>
                        @error('device_id') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="to">Destination Number</label>
                        <input wire:model.defer="to" type="tel" class="form-control"
                            placeholder="Enter destination number" name="destination_number">
                        @error('to') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <label for="message">Message</label>
                                <textarea wire:model.defer="message" type="text" class="form-control"
                                    placeholder="Enter message" name="message"></textarea>
                                @error('message') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-4">
                                <button wire:click.prevent="randomMessage" type="button"
                                    class="btn btn-sm btn-dark">Random
                                    Message</button>
                                <div wire:loading wire:target="randomMessage">
                                    <p>Random...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                        <a href="{{ route('message') }}" class="btn btn-secondary">Back</a>
                    </div>
                    <div wire:loading wire:target="add">
                        <p>Sending message...</p>
                    </div>
                </form>
                @if(config('app.use_job_queue'))
                <div class="alert alert-info text-white">
                    <p class="m-0">Message will be sent using job queue. <a
                            href="https://github.com/cinderjk/zete/tree/master#use_job_queue-if-you-enable-it-you-will-need-a-cron-job-to-run-these-commands">Docs</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>