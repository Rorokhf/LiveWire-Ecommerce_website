<div>
    <div class="container" style="padding:30px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change password
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class=" alert alert-success">{{Session::get('message')}}</div>
                             @endif
                             @if (Session::has('E_message'))
                        <div class=" alert alert-danger">{{Session::get('E_message')}}</div>
                             @endif
                        <form class="form-horizontal" wire:submit.prevent="ChangePassword">
                            <div class="form-group">
                                <label class="control-label col-md-4">Current password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Current password" class="form-control input-md"
                                        name="current_password" wire:model="current_password">
                                    @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">New password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="New password" class="form-control input-md"
                                        name="N_password" wire:model="N_password">
                                        @error('N_password')
                                    <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">confirm password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Confirm password" class="form-control input-md"
                                        name="c_password" wire:model="c_password">
                                        @error('c_password')
                                    <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
