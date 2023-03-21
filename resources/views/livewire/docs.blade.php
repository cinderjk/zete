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
                            class="form-control" readonly value="{{ auth()->user()->api_key }}" id="api-key">
                    </div>
                </div>
            </div>

            <div class="card-body ">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#send-message" role="tablist">
                            Send Message
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#chat-list" role="tablist">
                            Chat List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#chat-conversation" role="tablist">
                            Chat Conversation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#group-list" role="tablist">
                            Group List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#group-conversation" role="tablist">
                            Group Conversation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#group-info" role="tablist">
                            Group Info
                        </a>
                    </li> --}}
                </ul>
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="send-message">
                        @livewire('docs.send-message')
                    </div>
                    {{-- <div class="tab-pane" id="chat-list">
                        @livewire('docs.chat-list')
                    </div>
                    <div class="tab-pane" id="chat-conversation">
                        @livewire('docs.chat-conversation')
                    </div>
                    <div class="tab-pane" id="group-list">
                        @livewire('docs.group-list')
                    </div>
                    <div class="tab-pane" id="group-conversation">
                        @livewire('docs.group-conversation')
                    </div>
                    <div class="tab-pane" id="group-info">
                        @livewire('docs.group-info')
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $('#api-key').on('click', function(e) {
            e.preventDefault();
            $(this).select();
            document.execCommand('copy');
            alert('Copied');
        });
    </script>
    @endpush
</div>