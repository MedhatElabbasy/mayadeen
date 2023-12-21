@extends('dashboard.layouts.master2')

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">

            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="text-center">
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">MAYA<span>DEE</span>N</h1>
                                        <div class="mb-5 d-flex">
                                            {{-- <a href="{{ url('/' . $page='index') }}"><img src="{{ URL::asset('assets/app/login/mayadeen_sa_logo.jpg') }}" class="sign-favicon ht-100" alt="logo"></a> --}}

                                        </div>
                                    </div>

                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>مرحبآ بعودتك </h2>
                                            <h5 class="font-weight-semibold mb-4">من فضلك قم بتسجيل الدخول </h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>البريد الاكتروني </label>
                                                    <input class="form-control" placeholder="Enter your email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>كلمة المرور</label>
                                                    <input class="form-control" placeholder="Enter your password" type="password" name="password" required>
                                                </div>
                                                <button class="btn btn-main-primary btn-block" type="submit"> دخول  </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

                 <!-- The image half -->
                 <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ URL::asset('assets/app/login/mayadeen_sa_logo.jpg') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Add your JS scripts if needed -->
@endsection
