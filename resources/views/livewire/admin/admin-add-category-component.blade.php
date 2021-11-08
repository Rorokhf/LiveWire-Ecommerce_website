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
                                <h3> Add new Category</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('amin.categories') }}" class="btn btn-success pull-right">All
                                    Caregorie</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body ">
                        @if (Session::has('message'))
                            <div class=" alert alert-success">{{ Session::get('message') }}</div>

                        @endif
                        <form class="form-horizontal " wire:submit.prevent="storCategory">
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Category/subcategory Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="category Name" class="form-control input-md col-4"
                                        wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Category/subcategory slug</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="category slug" class="form-control col-4"
                                        wire:model="slug" />
                                    @error('slug')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <p ><b style="color:red; margin-left:35%;">Note:</b>To generate a subcategory u must choose Parent Category</p>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Parent Category </label>


                                <div class="col-md-6">
                                    <select class="form-control " wire:model="category_id">
                                        <option value="">None </option>
                                        @foreach ($categories as $category)

                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
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
