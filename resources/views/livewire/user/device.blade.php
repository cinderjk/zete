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
                            @foreach ($devices as $item)
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
                                    $36,738
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>