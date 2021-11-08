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
                        All Orders
                    </div>
                    <div class="panel-body">

                        <table class="table table-hover">
                            @if (Session::has('order_message'))
                                <div class=" alert alert-success">{{ Session::get('order_message') }}</div>

                            @endif
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First Name </th>
                                    <th>Last Name</th>
                                    <th>Mobile</th>
                                    <th>zipcode</th>
                                    <th>status</th>
                                    <th>order Date</th>
                                    <th>Action</th>
                                    <th colspan="2" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)


                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>${{ $order->subtotal }}</td>
                                        <td>${{ $order->discount }}</td>
                                        <td>${{ $order->tax }}</td>
                                        <td>${{ $order->total }}</td>
                                        <td>{{ $order->firstname }} </td>
                                        <td>{{ $order->lastname }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->zipcode }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="{{ route('admin.order-details', ['order_id' => $order->id]) }}"
                                                class="btn btn-info btn-sm">Details</a></td>

                                        <td>

                                            <ul class='nav btn btn-dark'>

                                                <li>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown"
                                                            href="#">Status <span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                            <li>
                                                                <a class="btn btn-success" href="#"
                                                                    wire:click.prevent="updateOrderStatus({{ $order->id}}, 'delivered' )">Delavered
                                                                </a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li><a class="btn btn-danger" href="#"
                                                                    wire:click.prevent="updateOrderStatus({{ $order->id}}, 'canceled' )">Canceled
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                            </ul>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
