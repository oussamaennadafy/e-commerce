@extends('vendor.dashboard.layouts.master')


@section('content')
    <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="far fa-user"></i> profile</h3>
                <div class="wsus__dashboard_profile">
                    <div class="wsus__dash_pro_area">
                        <h4>basic information</h4>
                        <form enctype="multipart/form-data" action="{{ route('user.profile.update') }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <div class="wsus__dash_pro_img">
                                        <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/default_profile_picture.jpeg') }}"
                                            alt="img" class="img-fluid w-100">
                                        <input name="image" type="file">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input value="{{ old('name', Auth::user()->name) }}" name="name" type="text"
                                            placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fal fa-envelope-open"></i>
                                        <input value="{{ old('email', Auth::user()->email) }}" name="email" type="emai"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <button class="common_btn mb-4 mt-2" type="submit">save changes</button>
                            </div>
                        </form>
                        <div class="wsus__dash_pass_change mt-2">
                            <h4>reset password</h4>

                            <form method="POST" action="{{ route('user.profile.update.password') }}" class="row">
                                @csrf
                                @method('patch')
                                <div class="col-xl-4 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-unlock-alt"></i>
                                        <input name="current_password" type="password" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-lock-alt"></i>
                                        <input name="password" type="password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-lock-alt"></i>
                                        <input name="password_confirmation" type="password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="common_btn" type="submit">save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
