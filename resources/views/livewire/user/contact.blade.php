<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    @if (count($selected) > 0)
                    <div>
                        <button wire:click="selectAll" type="button" class="btn btn-dark deleteSelected">
                            Select All
                        </button>
                        <button wire:click="deleteSelected" type="button" class="btn btn-danger deleteSelected">
                            Delete ({{ count($selected) }})
                        </button>
                    </div>
                    @else
                    <h4 class="card-title">Contacts</h4>
                    @endif
                    <div>
                        <a href="{{ route('add-contact') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="input-group no-border mt-3">
                            <input wire:model="q" type="text" class="form-control" id="search" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <select wire:model.lazy="g" class="form-control mt-3">
                            <option value="">Select Group</option>
                            @foreach ($groups as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <select wire:model.lazy="perPage" class="form-control mt-3">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
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
                                            <input class="form-check-input" type="checkbox" id="selectVisible">
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
                                    Group
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
                                            <input class="form-check-input itemData" type="checkbox"
                                                id="item-{{ $item->id }}">
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
                                    {{ $item->group->name }}
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('edit-contact', ['id' => $item->id]) }}"
                                        class="btn btn-icon btn-primary" title="Edit">
                                        <i class="now-ui-icons design-2_ruler-pencil"></i>
                                    </a>
                                    <button wire:click.prevent="delete('{{ $item->id }}')" class="btn btn-icon btn-dark"
                                        title="Delete">
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
    @push('scripts')
    <script>
        $(document).ready(function() {
                $('#selectVisible').click(function() {
                    if ($(this).is(':checked')) {
                        // $('.form-check-input').prop('checked', true);
                        var ids = [];
                        $('.itemData').each(function(){
                            $(this).prop('checked', true);
                            var id = $(this).attr('id');
                            id = id.replace('item-', '');
                            ids.push(id);
                        });
                        Livewire.emit('selectVisible', ids);
                    } else {
                        $('.form-check-input').prop('checked', false);
                        Livewire.emit('deselectAll');
                    }
                });
                $('.itemData').click(function() {
                    id = $(this).attr('id'); 
                    id = id.split('-')[1];
                    if ($(this).is(':checked')) {
                        Livewire.emit('selectItem', id);
                    } else {
                        Livewire.emit('deselectItem', id);
                    }
                });

                $('#search').on('focus', function() {
                    $(this).select();
                });

                $('.page-item').on('click', function() {
                    $('.form-check-input').prop('checked', false);
                    Livewire.emit('deselectAll');
                });

                window.addEventListener('uncheckSelectAll', event => {
                    $('#selectVisible').prop('checked', false);
                    $('.itemData').each(function(){
                        $(this).prop('checked', false);
                    });
                })

                window.addEventListener('checkSelectAll', event => {
                    $('#selectVisible').prop('checked', true);
                    $('.itemData').each(function(){
                        $(this).prop('checked', true);
                    });
                });
            });
    </script>
    @endpush
</div>