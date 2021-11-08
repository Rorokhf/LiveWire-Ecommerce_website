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
                              <h3> Edit Coupon</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.coupon') }}" class="btn btn-success pull-right">All Coupons</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body ">
                        @if (Session::has('message'))
                        <div class=" alert alert-success">{{Session::get('message')}}</div>
                            
                        @endif
                        <form class="form-horizontal " wire:submit.prevent="updateCoupon">
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Coupon code</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="coupon code" class="form-control input-md col-4" wire:model="code" />
                                    @error('code')
                                        <p class="alert alert-danger">{{$message}} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Coupon Type</label>
                                <div class="col-md-6">
                                   <select class="form-control" wire:model="type"> 
                                       <option value="" >Select</option>
                                       <option value="fixed">Fixed</option>
                                       <option value="percent">percent</option>
                                   </select>
                                    @error('type')
                                        <p class="alert alert-danger">{{$message}} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Coupon Value:</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Coupon Value" class="form-control input-md col-4" wire:model="value" />
                                    @error('value')
                                        <p class="alert alert-danger">{{$message}} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> cart Value:</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Cart Value" class="form-control input-md col-4" wire:model="cart_value" />
                                    @error('cart_value')
                                        <p class="alert alert-danger">{{$message}} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"> Expiry Date:</label>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class='input-group date' id='Expiry_Date'>
                                            <input type='text' class="form-control" placeholder="Y-MM-DD h:m:s" wire:model="Expiry_Date"/>
                                            <span class="input-group-addon">
                                            <span class="fa fa-calendar">
                                            </span>
                                            </span>
                                         </div>
                                    </div>
                                    @error('Expiry_Date')
                                        <p class="alert alert-danger">{{$message}} </p>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary ">Update</button>

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
        $(function(){
            $('#Expiry_Date').datetimepicker({
                format:'Y-MM-DD h:m:s',
            })
            .on('dp.change',function(ev){
                var data= $('#Expiry_Date').val();
                @this.set('Expiry_Date',data);

            });
        });
        </script>
@endpush

