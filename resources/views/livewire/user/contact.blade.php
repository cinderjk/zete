<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Contacts</h4>
                    <div>
                        <a href="{{ route('add-contact') }}" class="btn btn-primary">Add</a>
                        <button type="button" class="btn btn-success">
                            Import Contacts
                        </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input wire:model.defer="stay" class="form-check-input" type="checkbox">
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Tags
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input wire:model.defer="stay" class="form-check-input" type="checkbox">
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ 'abc' }}
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('edit-device', ['id' => $item->id]) }}"
                                        class="btn btn-icon btn-primary" title="Edit">
                                        <i class="now-ui-icons design-2_ruler-pencil"></i>
                                    </a>
                                    <button wire:click.prevent="deleteDevice('{{ $item->id }}')"
                                        class="btn btn-icon btn-dark" title="Delete">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                </td>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Empty contacts :(
                                </td>
                            </tr>
                            @endforelse
                            <tr>
                                <td colspan="5" class="text-center">
                                    <button wire:click.prevent="$emitUp('refresh')" type="button"
                                        class="btn btn-secondary">
                                        <span wire:loading.remove>Refresh</span>
                                        <span wire:loading>Getting Data...</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>