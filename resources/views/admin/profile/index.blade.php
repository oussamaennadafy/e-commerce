@extends('admin.layouts.master')


@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
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
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full Name</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ Auth::user()->name }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the full name
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>email</label>
                                        <input name="email" type="text" class="form-control"
                                            value="{{ Auth::user()->email }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>

                                    </div>
                                </div>
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
                                    </div>
                                    <div class="form-group col-12">
                                        <label>new Password</label>
                                        <input name="password" type="password" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the new password
                                        </div>

                                    </div>
                                    <div class="form-group col-12">
                                        <label>Confirme Password</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please confirm the new password
                                        </div>
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
