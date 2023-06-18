@extends("layouts.app")
@section("content")
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <strong>Update Food</strong>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-7">
                                @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{Session::get('message')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="my-2 d-flex justify-content-center">
                                    <img id="image" src="{{url('/storage/images/foods/'.$foods[0]->food_picture)}}" class="img-thumbnail rounded-0" style="object-fit: scale-down; height: 200px; width:200px"/>
                                </div>
                                <form action="{{route('admin.update.food.post', $foods[0]->food_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf()
                                    <div class="row">
                                        <input type="hidden" name="alter_food_picture" value="{{$foods[0]->food_picture}}">
                                        <div class="col-6">
                                            <label class="form-label">Food Name</label>
                                            <input class="form-control shadow-none rounded-0" name="food_picture" type="file" id="files">
                                            @error("food_picture")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Food Name</label>
                                            <input type="text" class="form-control rounded-0 shadow-none" name="food_name" placeholder="Food Name" value="{{$foods[0]->food_name}}">
                                            @error("food_name")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label class="form-label">Food Description</label>
                                            <div class="form-floating">
                                                <textarea class="form-control shadow-none rounded-0" name="food_description" placeholder="Food Description" id="food-description" style="height: 100px">{{$foods[0]->food_description}}</textarea>
                                                <label for="food-description">Food Description</label>
                                            </div>
                                            @error("food_description")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label class="form-label">Food Price</label>
                                            <input type="text" class="form-control shadow-none rounded-0" name="food_price" placeholder="Food Price" value="{{$foods[0]->food_price}}">
                                            @error("food_price")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label class="form-label">Food Quantity</label>
                                            <input type="number" class="form-control shadow-none rounded-0" name="food_quantity" placeholder="Food Quantity" value="{{$foods[0]->food_quantity}}">
                                            @error("food_quantity")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="my-3 d-grid">
                                        <button type="submit" class="btn btn-success shadow-none rounded-0">Add Food</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection