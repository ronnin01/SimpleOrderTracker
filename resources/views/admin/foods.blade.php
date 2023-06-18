@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <strong>Foods</strong>
                    </div>
                    <div class="card-body">
                        <div class="my-2">
                            <a href="{{route('admin.add.foods.page')}}" class="btn btn-sm btn-success rounded-0 shadow-none">Add Food</a>
                        </div>
                        <hr>
                        <div class="my-2">
                            @if($message = Session::get("message"))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="my-2">
                            <table class="table table-bordered" id="foods">
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
                                    @foreach($foods as $food)
                                        <tr class="text-center">
                                            <td>{{$count++}}</td>
                                            <td>
                                                <img src="{{url('/storage/images/foods/'.$food->food_picture)}}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: scale-down;" alt="">
                                            </td>
                                            <td>{{$food->food_name}}</td>
                                            <td>{{$food->food_description}}</td>
                                            <td>${{$food->food_price}}</td>
                                            <td>{{$food->food_quantity}}</td>
                                            <td>
                                                <a href="{{route('admin.update.food.page', $food->food_id)}}" class="btn btn-sm btn-warning rounded-0 shadow-none">Update</a>
                                                <form action="{{route('admin.delete.food.post', $food->food_id)}}" method="POST">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-none rounded-0">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection