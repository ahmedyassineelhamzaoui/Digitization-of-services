<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
    @yield('vite')
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />


	<!-- ================== BEGIN core-css ================== -->
    {{-- <link rel="stylesheet" href="assets/css/vendor.min.css"> --}}
    <link rel="stylesheet" href={{url('assets/css/vendor.min.css')}}>

        {{-- <link rel="stylesheet" href="assets/css/default/app.min.css"> --}}
    <link rel="stylesheet" href={{url('assets/css/default/app.min.css')}}>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href={{url('css/style.css')}}>
    {{-- @livewireStyles --}}


	<!-- ================== END core-css ================== -->
</head>
<body style="background-color: #0F0E17;">

    @yield('content')


<!-- ================== BEGIN core-js ================== -->
{{-- @livewireScripts --}}

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<!-- ================== select js ================== -->

{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}

{{-- <script src="assets/js/vendor.min.js"></script> --}}
<script src={{url('assets/js/vendor.min.js')}}></script>
    {{-- <script src="assets/js/app.min.js"></script> --}}
    <script src={{url('assets/js/app.min.js')}}></script>


	<!-- ================== END core-js ================== -->
	<script src={{url('js/main.js')}}></script>
    @yield('script')

</body>
</html>
