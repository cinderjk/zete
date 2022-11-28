<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Documentation API</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h6 class="card-title">API KEY</h6>
                    </div>
                    <div class="col-8">
                        <input type="password" onfocusin="(this.type='text')" onfocusout="(this.type='password')"
                            class="form-control" readonly value="{{ auth()->user()->api_key }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header p-0">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#send-message"
                            type="button" role="tab">Send Message</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button"
                            role="tab">Profile</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="send-message" role="tabpanel">
                        @livewire('docs.send-message')
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        1234
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>