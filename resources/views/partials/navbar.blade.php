
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            Pawtopia        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            @if (auth()->check())

                <ul class="navbar-nav me-auto mb-lg-0 ms-lg-4" style="width: 65%">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products') }}">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('customers')  }}">Manage Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cart') }}">Manage Cart</a>
                    </li>

                </ul>

                <ul class="navbar-nav ms-auto mb-lg-0 d-flex">

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-sm" >
                                <i class="fal fa-arrow-to-left"></i> Logout
                            </button>
                        </form>

                    </li>

                </ul>

                @else
                <ul class="navbar-nav ms-auto mb-lg-0 d-flex">
                    <li class="nav-item">
                        <a class="btn btn-outline btn-sm" href="{{ route('login') }}">
                            <i class="far fa-user-plus"></i>
                            Login
                        </a>
                    </li>
                </ul>

            @endif

        </div>
    </div>
</nav>
