<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Manage Home Categories </h3>
                            </div>

                        </div>

                    </div>
                    <div class="panel-body ">

                        @if (Session::has('message'))
                            <div class=" alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group ">
                                <label class="control-label col-md-4"> choose categories</label>
                                <div class=" col-md-4" wire:ignore>
                                    <select class="sel_categories form-control " name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="form-group ">
                               
                                    <label class=" control-label col-md-4"> No products</label>
                                <div class=" col-md-4">
                                    <input type="text" placeholder="product Name"
                                     class="form-control input-md col-4" wire:model="numberofproducts" />

                                
                                    
                                </div>
                            </div>

                            <div class="form-group col-4 row">
                                <label class="col-md-4 control-label"></label>
                                <div cls="col-md-4">
                                    <button type="submit" class="btn btn-primary">save</button>

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
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e){
                var data=$('.sel_categories').select2('val');
                @this.set('selected_categories',data);

            });

        });

        </script>
@endpush
