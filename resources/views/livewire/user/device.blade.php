<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Devices</h4>
                    <a href="{{ route('add-device') }}" class="btn btn-primary">Add</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Device ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Status
                                </th>
                                <th class="text-right">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($devices as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                    <span class="badge badge-success">Connected</span>
                                    @else
                                    <span class="badge badge-danger">Disconnected</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('edit-device', ['id' => $item->id]) }}" class="btn btn-icon btn-primary" title="Edit">
                                        <i class="now-ui-icons design-2_ruler-pencil"></i>
                                    </a>
                                    @if ($item->status == 1)
                                    <button wire:click.prevent="disconnect('{{ $item->id }}')"
                                        class="btn btn-icon btn-danger" title="Disconnect">
                                        <i class="now-ui-icons media-1_button-power"></i>
                                    </button>
                                    @else
                                    <a href="{{ route('scan-device', ['id' => $item->id]) }}"
                                        class="btn btn-icon btn-success" title="Connect">
                                        <i class="now-ui-icons loader_refresh"></i>
                                    </a>
                                    @endif
                                    <button wire:click.prevent="deleteDevice('{{ $item->id }}')"
                                        class="btn btn-icon btn-dark" title="Delete">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No devices, please add a device.
                                </td>
                            </tr>
                            @endforelse
                            <tr>
                                <td colspan="5" class="text-center">
                                    <button wire:click.prevent="$emitUp('refresh')" type="button"
                                        class="btn btn-secondary">Refresh</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div wire:init="checkSession"></div>
</div>