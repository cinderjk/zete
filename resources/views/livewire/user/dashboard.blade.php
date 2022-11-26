<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category text-dark">Devices</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="m-0">{{ $devices }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category text-success">Connected Devices</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="m-0">{{ $connected_devices }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category text-danger">Disonnected</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="m-0">{{ $disconnected_devices }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>