<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Groups</h4>
                    <div>
                        <a href="{{ route('add-contact') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <div class="input-group no-border mt-3">
                            <input wire:model="q" type="text" class="form-control" id="search" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </div>
                            </div>
                        </div>
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
                                    Name
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($groups as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
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
                                    Empty groups :(
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
                {{ $groups->links() }}
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function() {
                $('#search').on('focus', function() {
                    $(this).select();
                });
            });
    </script>
    @endpush
</div>