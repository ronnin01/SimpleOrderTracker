@extends("layouts.app")
@section("content")
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <strong>Order</strong>
                    </div>
                    <div class="card-body">
                        @if(count($order) > 0)
                            <div class="my-2">
                                <input type="hidden" id="user_id" value="{{auth()->user()->id}}">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" id="progress-bar" style="width: <?=$order[0]->checkout_status?>%;" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between">
                                <strong>Accepted</strong>
                                <strong>Packed</strong>
                                <strong>To Ship</strong>
                                <strong>To Deliver</strong>
                                <strong>Received</strong>
                            </div>
                            <div class="my-2 g-1 row justify-content-between">
                                @foreach($order as $value)
                                    <div class="col-12 col-md-6 col-lg-4">
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
                        @else
                            <div class="my-2 text-center">
                                <h3>There is no orders yet.</h3>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection