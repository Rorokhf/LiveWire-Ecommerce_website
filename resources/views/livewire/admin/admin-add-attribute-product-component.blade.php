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
                                <h3> Add new Attrbute</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.attrebute-product') }}" class="btn btn-success pull-right">All
                                    Attrbute</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body ">
                        @if (Session::has('message'))
                            <div class=" alert alert-success">{{ Session::get('message') }}</div>

                        @endif
                        <form class="form-horizontal " wire:submit.prevent="storAttrbute">
                            <div class="form-group ">
                                <label class="col-md-4 control-label">  Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Name" class="form-control input-md col-4"
                                        wire:model="name"  />
                                    @error('name')
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
