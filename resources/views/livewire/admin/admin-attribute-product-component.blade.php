<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .sclist {
            list-style: none;
        }
        .sclist li{
            line-height:33px;
            border-bottom:1px solid #ccc ;
        }

    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-6">
                            <h3> All Attrbute </h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.add-attrebute-product') }}" class="btn btn-success pull-right">add new
                                Attrbute</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>

                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th>Name </th>

                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($pattrbute as $pattr)
                                    <tr>
                                        <td>{{ $pattr->id }} </td>
                                        <td>{{ $pattr->name }} </td>
                                        <td>{{ $pattr->created_at }} </td>

                                        <td>
                                            <a
                                                href="{{ route('admin.Edit-attrebute-product', ['attrebute_id' => $pattr->id]) }}"><i
                                                    class="fa fa-edit sa-2x"></i> Edit</a>
                                            <a href="#"
                                                onclick="confirm('Are you sure, You want to delete this attrbute?')|| event.StopImmediatePropagation() "
                                                wire:click.prevent="deleteAttrbute({{ $pattr->id }})"
                                                style="margin-left:10px;"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>
                        {{ $pattrbute->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
