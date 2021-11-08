<div>
    <div>
        <style>
            nav svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }

        </style>
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3> Setting</h3>
                                </div>

                            </div>

                        </div>
                        <div class="panel-body ">
                            @if (Session::has('message'))
                                <div class=" alert alert-success">{{ Session::get('message') }}</div>

                            @endif

                            <form class="form-horizontal " wire:submit.prevent="saveSetting">
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> email</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="email" class="form-control input-md col-4"
                                            wire:model="email"  />
                                        @error('email')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> phone</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="phone" class="form-control input-md "
                                            wire:model="phone" />
                                        @error('phone')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> phone2</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="phone2'" class="form-control input-md"
                                            wire:model="phone2" />
                                        @error('phone2')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> address</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="address" class="form-control input-md"
                                            wire:model="address" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> Map</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Map" class="form-control input-md"
                                            wire:model="map" />
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> twitter</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="twitter" class="form-control input-md"
                                            wire:model="twitter" />
                                        @error('twitter')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> facebook</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="facebook" class="form-control input-md"
                                            wire:model="facebook" />
                                        @error('facebook')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> pintrest</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="pintrest" class="form-control input-md"
                                            wire:model="pintrest" />
                                        @error('pintrest')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> instgram</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="instgram" class="form-control input-md"
                                            wire:model="instgram" />
                                        @error('instgram')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> youtube</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="youtube" class="form-control input-md"
                                            wire:model="youtube" />
                                        @error('youtube')
                                            <p class="alert alert-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary ">submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
