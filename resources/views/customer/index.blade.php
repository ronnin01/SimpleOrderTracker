@extends("layouts.app")
@section('content')
    <div class="container">
        <section>
            <div class="row justify-content-center align-items-center">
                <div class="col">
                    <div class="text-start">
                        <h1 class="display-5">Burger Pizza Food Restaurant & Delivery</h1>
                        <p class="lead">Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.</p>
                        <a href="#orders" class="btn btn-dark rounded-0 shadow-none">Order Now</a>
                    </div>
                </div>
                <div class="col d-lg-block d-none">
                    <img src="{{url('/images/about-img.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div class="text-center my-2" id="orders">
                <h2 class="fw-light">Our Menu</h2>
            </div>
            <div class="my-5">
                <div class="g-2 row justify-content-center align-items-center">
                    @foreach($foods as $food)
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="card rounded-0 bg-dark shadow" style="height: 450px;">
                                <div class="card-body text-white d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex justify-content-center">
                                            <img src="{{url('/storage/images/foods/'.$food->food_picture)}}" style="width: 200px; height: 200px; object-fit: scale-down;" alt="">
                                        </div>
                                        <div class="my-2 text-start">
                                            <h3>{{$food->food_name}}</h3>
                                            <p class="text-muted">{{$food->food_description}}</p>
                                        </div>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <p class="lead">${{$food->food_price}}</p>
                                        <a href="{{route('customer.add.order.to.cart.post', $food->food_id)}}">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection