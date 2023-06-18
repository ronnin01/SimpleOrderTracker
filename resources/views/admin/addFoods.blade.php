@extends("layouts.app")
@section("content")
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <strong>Add Foods</strong>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-7">
                                <div class="my-2 d-flex justify-content-center">
                                    <img id="image" class="img-thumbnail rounded-0" style="object-fit: scale-down; height: 200px; width:200px"/>
                                </div>
                                <form action="{{route('admin.add.foods.post')}}" method="POST" enctype="multipart/form-data">
                                    @csrf()
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Food Name</label>
                                            <input class="form-control shadow-none rounded-0" name="food_picture" type="file" id="files">
                                            @error("food_picture")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Food Name</label>
                                            <input type="text" class="form-control rounded-0 shadow-none" name="food_name" placeholder="Food Name" value="{{old('food_name')}}">
                                            @error("food_name")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label class="form-label">Food Description</label>
                                            <div class="form-floating">
                                                <textarea class="form-control shadow-none rounded-0" name="food_description" placeholder="Food Description" id="food-description" style="height: 100px">{{old('food_description')}}</textarea>
                                                <label for="food-description">Food Description</label>
                                            </div>
                                            @error("food_description")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label class="form-label">Food Price</label>
                                            <input type="text" class="form-control shadow-none rounded-0" name="food_price" value="{{old('food_price')}}" placeholder="Food Price">
                                            @error("food_price")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label class="form-label">Food Quantity</label>
                                            <input type="number" class="form-control shadow-none rounded-0" name="food_quantity" value="{{old('food_quantity')}}" placeholder="Food Quantity">
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

    <script>
        document.getElementById('files').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image').src = src
        }
    </script>
@endsection