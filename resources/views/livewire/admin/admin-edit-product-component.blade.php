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
                                <h3> Edit Product</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All
                                    products</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body ">
                        @if (Session::has('message'))
                            <div class=" alert alert-success">{{ Session::get('message') }}</div>

                        @endif

                        <form class="form-horizontal " wire:submit.prevent="updateProduct">
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> product Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="product Name" class="form-control input-md col-4"
                                        wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> product slug</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="product slug" class="form-control input-md"
                                        wire:model="slug" />
                                    @error('slug')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> short description</label>
                                <div class="col-md-6" wire:ignore>
                                    <input type="text" id="short_description" placeholder="short_description"
                                        class="form-control input-md" wire:model="short_description" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> description</label>
                                <div class="col-md-6">
                                    <input type="text" id="description" placeholder="description"
                                        class="form-control input-md" wire:model="description" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> regular_price'</label>
                                <div class="col-md-6" wire:ignore>
                                    <input type="text" placeholder="regular_price'" class="form-control input-md"
                                        wire:model="regular_price" />
                                    @error('regular_price')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Sale price'</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Sale price'" class="form-control input-md"
                                        wire:model="sale_price" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> SKU'</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="SKU'" class="form-control input-md"
                                        wire:model="SKU" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> stock</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="stock_statu">
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_statu')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group c">
                                <label class="col-md-4 control-label"> Featured</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Quantity</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Quantity" class="form-control input-md"
                                        wire:model="quantity" />
                                    @error('quantity')
                                        <p class="alert alert-danger">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="input-file" wire:model="newImg" />
                                    @if ($newImg)
                                        <img src="{{ $newImg->temporaryUrl() }}" width="120">
                                    @else
                                        <img src="{{ asset('assets/images/products') }}/{{ $image }}"
                                            width="120">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Gellary</label>
                                <div class="col-md-6">
                                    <input type="file" class="input-file" wire:model="newImages" multiple />
                                    @if ($newImages)
                                        @foreach ($newImages as $newImage)
                                            @if ($newImage)

                                                <img src="{{ $newImage->temporaryUrl() }}" width="120">
                                            @endif

                                        @endforeach

                                    @else
                                        @foreach ($images as $image)
                                            @if ($image)

                                                <img src="{{ asset('assets/images/products') }}/{{ $image }}"
                                                    width="120">
                                            @endif

                                        @endforeach


                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Category</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Subcategory</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="subcategory_id"
                                        wire:change="changeSubcategory">
                                        <option value="0">Select Category</option>
                                        @foreach ($subcategory as $scategory)
                                            <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                        @endforeach

                                    </select>
                                    {{-- @error('subcategory_id')
                                        <p class="alert alert-danger">{{$message}} </p>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Attrbute</label>
                                <div class="col-md-5">
                                    <select class="form-control" wire:model="product_Attrbute">
                                        <option value="0">Select Attrbute</option>
                                        @foreach ($productAttrbute as $pattrbute)
                                            <option value="{{ $pattrbute->id }}">{{ $pattrbute->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                                </div>
                            </div>
                            @foreach ($inputs as $key => $value)
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"> {{$productAttrbute->where('id',$attrbute_arr[$key])->first()->name}}</label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="{{$productAttrbute->where('id',$attrbute_arr[$key])->first()->name}}" class="form-control input-md"
                                            wire:model="attrbute_value.{{$value}}" />
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger" wire:click.prevent="remove({{$key}})">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group col-4 row">
                                <label class="col-md-4 control-label"></label>
                                <div cls="col-md-4">
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
@push('scripts')
    <script>
        $(function() {

            tinymce.init({
                selector: '#short_description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_date = $('#short_description').val();
                        @this.set('short_description', d_date);
                    });
                }

            });

            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_date = $('#description').val();
                        @this.set('description', sd_date);
                    });
                }

            });

        });
    </script>
@endpush
