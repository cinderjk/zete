<div class="container">
    <div class="row justify-content-center">
        <div class="col-5 mt-5 pt-5">
            <div class="wrap">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Log in</h3>
                        </div>
                    </div>
                    <form wire:submit.prevent="login">
                        <div class="form-group mt-3">
                            <label for="username">Username</label>
                            <input wire:model.defer="loginKey" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input wire:model.defer="password" id="password-field" type="password" class="form-control"
                                required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Log
                                in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>