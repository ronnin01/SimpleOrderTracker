@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <strong>Food Orders</strong>
                    </div>
                    <div class="card-body">
                        <div class="my-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Order Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr class="text-center">
                                            <td>{{$count++}}</td>
                                            <td>{{$order->user_id}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('admin.orders.update.status.page', $order->user_id)}}" class="btn btn-sm btn-success text-light">View</a>
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