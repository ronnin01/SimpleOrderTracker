@extends("layouts.app")
@section("content")
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <strong>Customer Cart</strong>
                    </div>
                    <div class="card-body">
                        <div class="my-2">
                            @if($message = Session::get("message"))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="my-2">
                            <form action="{{route('customer.checkout.post')}}" method="POST">
                                @csrf()
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="cart">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Food Picture</th>
                                                <th>Food Name</th>
                                                <th>Food Description</th>
                                                <th>Food Price</th>
                                                <th>Food Quantity</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $food)
                                                <tr class="text-center">
                                                    <input type="hidden" name="order_id[]" value="{{$food->food_id}}">
                                                    <input type="hidden" name="order_price[]" value="{{$food->food_price}}">
                                                    <td>{{$count++}}</td>
                                                    <td>
                                                        <img src="{{url('/storage/images/foods/'.$food->food_picture)}}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: scale-down;" alt="">
                                                    </td>
                                                    <td>{{$food->food_name}}</td>
                                                    <td>{{$food->food_description}}</td>
                                                    <td>${{$food->food_price}}</td>
                                                    <td>
                                                        <input type="number" class="form-control rounded-0 shadow-none" required min="1" max="{{$food->food_quantity}}" name="order_quantity[]" placeholder="Pick Quantity">
                                                        @error('order_quantity[]')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-danger rounded-0 shadow-none">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="my-3 d-grid">
                                    <button type="submit" class="btn btn-success rounded-0 shadow-none">CheckOut</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection