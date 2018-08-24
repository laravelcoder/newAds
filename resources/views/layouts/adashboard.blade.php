<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')

    @stack('pagestyle')
    @stack('topscripts')
</head>


<body class="hold-transition skin-red sidebar-mini">

<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')




<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('pageHeader')
 
        <!-- Main content -->
        <section class="content container-fluid">

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
 
       
    </div>
    
 @include('partials.footer')


</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')

@stack('scripts')

</body>
</html>