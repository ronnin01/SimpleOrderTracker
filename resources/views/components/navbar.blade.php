<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        @if(Auth::check())
            @if(auth()->user()->type == "Admin")
                <a class="navbar-brand text-light" href="{{route('admin.index.page')}}">Pizza Order</a>
            @else
                <a class="navbar-brand text-light" href="{{route('customer.index.page')}}">Pizza Order</a>
            @endif
        @else
            <a class="navbar-brand text-light" href="{{route('customer.index.page')}}">Pizza Order</a>
        @endif
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="ms-auto navbar-nav">
                @if(Auth::check())
                    @if(auth()->user()->type == "Customer")
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="{{route('customer.index.page')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#orders">Menu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                            </a>
                            <ul class="dropdown-menu rounded-0" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('custoomer.cart.page')}}">Cart</a></li>
                                <li><a class="dropdown-item" href="{{route('customer.order.page')}}">Orders</a></li>
                                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('signin.page')}}">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('register.page')}}">Register</a>
                    </li>
                @endif

                @if(Auth::check())
                    @if(auth()->user()->type == "Admin")
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="{{route('admin.index.page')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('admin.foods.page')}}">Foods</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                            </a>
                            <ul class="dropdown-menu rounded-0" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>