<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Profile
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        @if ($users->profile->image)
                        <img src="{{asset('assets/images/profile')}} /{{$users->profile->image}}" width="100%">

                        @else
                        <img src="{{asset('assets/images/profile/defult.jpg')}} " width="100%">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><b>Name:</b>{{$users->name}}</p>
                        <p><b>Email:</b>{{$users->email}}</p>
                        <p><b>Phone:</b>{{$users->profile->mobile}}</p>
                        <hr>
                        <p><b>Line1:</b>{{$users->profile->line1}}</p>
                        <p><b>Line2:</b>{{$users->profile->line2}}</p>
                        <p><b>City:</b>{{$users->profile->city}}</p>
                        <p><b>province:</b>{{$users->profile->province}}</p>
                        <p><b>country:</b>{{$users->profile->country}}</p>
                        <p><b>zipcode:</b>{{$users->profile->zipcode}}</p>
                        <a href="{{route('user.edit-profile')}}" class="btn btn-info pull-right">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
