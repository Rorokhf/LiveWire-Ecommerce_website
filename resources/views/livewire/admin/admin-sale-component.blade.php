<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3>  Sale Setting</h3>

                    </div>
                    <div class="panel-body">
                        
                            @if (Session::has('message'))
                            <div class=" alert alert-success">{{Session::get('message')}}</div>
                                
                            @endif
                        <form class="form-horizontal" wire:submit.prevent="updatrSale">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Deactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <div class='input-group date' id='datetimepicker8'>
                                        <input type='text' class="form-control" wire:model="sale_date"/>
                                        <span class="input-group-addon">
                                        <span class="fa fa-calendar">
                                        </span>
                                        </span>
                                     </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
                $('#datetimepicker8').datetimepicker({
                    format:'Y-MM-DD h:m:s',
                })
                .on('dp.change',function(ev){
                    var data= $('#datetimepicker8').val();
                    @this.set('sale-date',data);

                });
            });
            </script>
    @endpush
