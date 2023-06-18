@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="my-4 row justify-content-center">
            <div class="col-7">
                <div class="card shadow rounded-0">
                    <div class="card-header">
                        <strong>Order Status Update</strong>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{Session::get('message')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="my-2">
                            <h3>Orders</h3>
                        </div>
                        <div class="my-2 row justify-content-between">
                            @foreach($order as $value)
                                <div class="col-4">
                                    <div class="card rounded-0" style="height: 350px;">
                                        <div class="card-body">
                                            <div class="my-2 d-flex justify-content-center">
                                                <img src="{{url('/storage/images/foods/'.$value->food_picture)}}" style="width: 100px; height: 100px; object-fit: scale-down;" alt="">
                                            </div>
                                            <div class="my-2 text-start">
                                                <h5>
                                                    <strong>
                                                        {{$value->food_name}}
                                                    </strong>
                                                </h5>
                                                <span>Description: {{$value->food_description}}</span> <br>
                                                <span>Total Quantity: {{$value->total_quantity}}</span> <br>
                                                <span>Total Price: <strong>${{$value->total_price}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="my-2">
                            <h3>Information</h3>
                        </div>
                        <div class="my-2">
                            <p class="lead"><strong>FullName: </strong>{{$order[0]->firstname}} {{$order[0]->lastname}}</p>
                            <p class="lead"><strong>Contact Number: </strong>{{$order[0]->contact_number}}</p>
                            <p class="lead"><strong>Address: </strong>{{$order[0]->address}}</p>
                            <p class="lead"><strong>Email: </strong>{{$order[0]->email}}</p>
                        </div>
                        <div class="my-2">
                            <form action="{{route('admin.orders.update.status.post')}}" method="POST">
                                @csrf()
                                <input type="hidden" name="user_id" value="{{$order[0]->user_id}}">
                                <div class="my-2">
                                    <label class="form-label">Select Status Delivery</label>
                                    <select name="checkout_status" class="form-select shadow-none rounded-0">
                                        <option value="" disabled>Please Select Status</option>
                                        @foreach($status as $stat)
                                            @if($stat == $order[0]->checkout_status)
                                                <option value="{{$stat}}" selected>{{$stat}}</option>
                                            @else
                                                <option value="{{$stat}}">{{$stat}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-3 d-grid">
                                    <button type="submit" class="btn btn-dark shadow-none rounded-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection