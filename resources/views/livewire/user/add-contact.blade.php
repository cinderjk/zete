<div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
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
                                <input wire:model.defer="phone" type="tel" class="form-control"
                                    placeholder="Enter phone number" name="phone">
                                @error('phone') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="group">Group</label>
                                <select wire:model.defer="group" name="group" class="form-control">
                                    <option value="">Select Group</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @error('group') <p class="text-danger pt-2 mb-0">{{ $message }}</p> @enderror
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
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Import Contacts</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('import-contact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <p class="mb-0">Download Template</p>
                                <a class="btn btn-success" href="{{ asset('template_contact.xlsx') }}"
                                    download>Download</a>
                            </div>
                            <div class="form-group">
                                <label for="upload">Upload</label>
                                <input readonly type="text" class="form-control" id="fileUpload">
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <div class="form-group">
                                <label for="group_import">Group</label>
                                <select name="group_import" required class="form-control">
                                    <option value="">Select Group</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function() {
                $('#fileUpload').on('click', function() {
                    $('#file').click();
                });
                $('#file').on('change', function() {
                    var filePath = $(this).val();
                    var fileName = filePath.substring(filePath.lastIndexOf('\\') + 1);
                    $('#fileUpload').val(fileName);
                });
            });
    </script>
    @endpush
</div>