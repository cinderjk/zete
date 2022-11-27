<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Messages</h4>
                    <div>
                        <a href="{{ route('add-message') }}" class="btn btn-primary">Add</a>
                        <button wire:click.prevent="clearLog" type="button" class="btn btn-danger">Clear Log</button>
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
                                <th>
                                    To
                                </th>
                                <th>
                                    Message
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Time
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($message_logs as $item)
                            <tr>
                                <td>
                                    {{ $item->device_name }}
                                </td>
                                <td>
                                    {{ $item->to }}
                                </td>
                                <td>
                                    {{ $item->message }}
                                </td>
                                <td>
                                    @if ($item->status == 200)
                                    <span class="badge badge-success">200</span>
                                    @else
                                    <span class="badge badge-danger">ERROR</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Empty log messages :)
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
                {{ $message_logs->links() }}
            </div>
        </div>
    </div>
</div>