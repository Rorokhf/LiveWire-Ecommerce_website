<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                    <div class=" alert alert-success">{{ Session::get('order_message') }}</div>

                @endif
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Order details</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.order') }}" class="btn btn-success pull-right">My Orders</a>
                                @if ($orders->status == 'delivered')
                                    <a href="#" class="btn btn-danger pull-right"
                                        wire:click.prevent="cancelOrder">cancel Order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <table class="table">
                            <tr>
                                <th>Order Id</th>
                                <td>{{ $orders->id }}</td>
                                <th>Order Date</th>
                                <td>{{ $orders->created_at }}</td>
                                <th>Status</th>
                                <td>{{ $orders->status }}</td>
                                {{-- @if ($orders->status == 'delivered')
                                    <th>delivery Date </th>
                                    <td>{{ $orders->delivered_date }}</td>
                                @else if($orders->status == 'canceled')
                                    <th>Cancele Date </th>
                                    <td>{{ $orders->canceled_date }}</td>
                                @endif --}}
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Order Item</h3>
                            </div>

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class=" main-content-area">
                            <div class="wrap-iten-in-cart">
                                <h3 class="box-title">Products Name</h3>
                                <ul class="products-cart">
                                    @foreach ($orders->orderItem as $item)



                                        <li class="pr-cart-item">
                                            <div class="product-image">
                                                <h5> image</h5>
                                                <figure><img
                                                        src="{{ asset('assets/images/products') }}/{{ $item->product->image }}"
                                                        alt="{{ $item->product->name }}"></figure>
                                            </div>
                                            <div class="product-name">
                                                <h5> Name</h5>
                                                <a class="link-to-product"
                                                    href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                            </div>

                                            @if($item->options)
                                            <div class="product-name">
                                                @foreach (unserialize($item->options) as $key=>$value)

                                                    <p><b>{{$key}}</b>{{$value}}</p>
                                               
                                                @endforeach
                                            </div>

                                            @endif
                                            <div class="price-field produtc-price">
                                                <h5> Price</h5>
                                                <p class="price">${{ $item->price }}
                                                </p>
                                            </div>
                                            <div class="quantity">
                                                <h5> Quantity</h5>

                                                <h5>{{ $item->quantity }}</h5>
                                            </div>

                                            <div class="price-field sub-total">
                                                <h5> Price x quantity</h5>
                                                <p class="price">${{ $item->price * $item->quantity }}</p>
                                            </div>
                                            @if ($orders->status == 'delivered' && $item->restatus == false)
                                                <div class="price-field sub-total">
                                                    <a href="{{route('user.review',['order_item_id'=>$item->id])}}">
                                                        <h5> Write Review</h5>
                                                    </a>


                                                </div>
                                            @endif
                                        </li>

                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>

                                <p class="summary-info"><span class="title">Subtotal</span><b
                                        class="index">${{ $orders->subtotal }}</b></p>

                                <p class="summary-info"><span class="title">Tax</span><b
                                        class="index">${{ $orders->tax }}</b></p>

                                <p class="summary-info"><span class="title">shipping</span><b
                                        class="index">Free shipping</b></p>

                                <p class="summary-info"><span class="title">Discount</span><b
                                        class="index">{{ $orders->discount }}</b></p>

                                <p class="summary-info"><span class="title">Total</span><b
                                        class="index">${{ $orders->total }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        billing Details
                    </div>

                    <div class="panel-body">
                    </div>
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <td>{{ $orders->firstname }}</td>
                            <th>Last Name</th>
                            <td>{{ $orders->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{ $orders->mobile }}</td>
                            <th>Email</th>
                            <td>{{ $orders->email }}</td>
                        </tr>
                        <tr>
                            <th>Address 1</th>
                            <td>{{ $orders->line1 }}</td>
                            <th>Adress 2</th>
                            <td>{{ $orders->line2 }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $orders->city }}</td>
                            <th>Province</th>
                            <td>{{ $orders->province }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $orders->country }}</td>
                            <th>Zipcode</th>
                            <td>{{ $orders->zipcode }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        {{-- @if ($orders->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        shipping Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{$orders->shipping->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$orders->shipping->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{$orders->shipping->mobile}}</td>
                                <th>Email</th>
                                <td>{{$orders->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>Address 1</th>
                                <td>{{$orders->shipping->line1}}</td>
                                <th>Adress 2</th>
                                <td>{{$orders->shipping->line2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$orders->shipping->city}}</td>
                                <th>Province</th>
                                <td>{{$orders->shipping->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$orders->shipping->country}}</td>
                                <th>Zipcode</th>
                                <td>{{$orders->shipping->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{ $orders->transaction->mode }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $orders->transaction->status }}</td>
                            </tr>
                            <tr>
                                <th>Date </th>
                                <td>{{ $orders->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
