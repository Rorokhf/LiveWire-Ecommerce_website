<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"><h3>Add Sliders </h3></div>
                            <div class="col-md-6"> 
                                <a href="{{ route('admin.slider') }}" class="btn btn-success pull-right">All Slider</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body ">

                        @if (Session::has('message'))
                        <div class=" alert alert-success">{{Session::get('message')}}</div>
                             @endif
    
                        <form class="form-horizontal"  wire:submit.prevent="addSlider">
                            <div class="form-group col-md-4 row">
                                <label class="col-md-6 control-label"> Title</label>
                                <div cls="col-md-6">
                                    <input type="text" placeholder="Title" class="form-control input-md col-4" wire:model="title" />

                                </div>
                            </div>

                            <div class="form-group col-md-4 row">
                                <label class="col-md-6 control-label"> SubTitle</label>
                                <div cls="col-md-6">
                                    <input type="text" placeholder="SubTitle" class="form-control input-md" wire:model="subtitle" />
                                </div>
                            </div>

                            <div class="form-group col-md-4 row">
                                <label class="col-md-6 control-label"> Price</label>
                                <div cls="col-md-6">
                                    <input type="text" placeholder="price" class="form-control input-md" wire:model="price" />
                                </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                <label class="col-md-6 control-label"> Link</label>
                                <div cls="col-md-6">
                                    <input type="text" placeholder="Link" class="form-control input-md" wire:model="link" />
                                </div>
                            </div>

                            <div class="form-group col-md-4 row">
                                <label class="col-md-6 control-label"> Image</label>
                                <div cls="col-md-6">
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 row">
                                <label class="col-md-6 control-label"> Status</label>
                                <div cls="col-md-6">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">not Active</option>
                                        <option value="1">InActive</option>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="form-group col-4 row">
                                <label class="col-md-4 control-label"></label>
                                <div cls="col-md-4">
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

