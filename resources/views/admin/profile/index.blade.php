@extends('admin.layouts.master')


@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            {{-- <h2 class="section-title">Hi, Ujang!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p> --}}

            <div class="row mt-sm-4">
                {{-- <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">Ujang Maman <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Web Developer
                                </div>
                            </div>
                            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                            fictional character but an original hero in my family, a hero for his children and for his wife.
                            So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John
                                Doe'</b>.
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow Ujang On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.profile.update') }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div>
                                        <img alt="image" src="{{ asset(Auth::user()->image) }}"
                                            class="rounded-circle profile-widget-picture img-thumbnail w-25 mb-4">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>image</label>
                                        <input name="image" type="file" class="form-control">
                                        {{-- <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div> --}}
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full Name</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ Auth::user()->name }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the full name
                                        </div>
                                        {{-- @error('name')
                                            <div>
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            </div>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>email</label>
                                        <input name="email" type="text" class="form-control"
                                            value="{{ Auth::user()->email }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                        {{-- @error('email')
                                            <div>
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            </div>
                                        @enderror --}}
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="ujang@maman.com" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Bio</label>
                                        <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-0 col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                id="newsletter">
                                            <label class="custom-control-label" for="newsletter">Subscribe to
                                                newsletter</label>
                                            <div class="text-muted form-text">
                                                You will get new information about products, offers and promotions
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('admin.password.update') }}" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>update password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Current Password</label>
                                        <input name="current_password" type="password" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the current password
                                        </div>
                                        {{-- @error('current_password')
                                            <div>
                                                <p class="text-danger">{{ $errors->first('current_password') }}</p>
                                            </div>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group col-12">
                                        <label>new Password</label>
                                        <input name="password" type="password" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the new password
                                        </div>
                                        {{-- @error('password')
                                            <div>
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            </div>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Confirme Password</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please confirm the new password
                                        </div>
                                        {{-- @error('password_confirmation')
                                            <div>
                                                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                            </div>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
