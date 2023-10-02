@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Vendor profile</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div> --}}
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi there!</h2>
            <p class="section-lead">Here you can create a brand new slider</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>update vendor Profile</h4>

                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('admin.vendor-profile.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>banner preview</label>
                                    <br>
                                    <img width="400" src="{{ asset($profile->banner) }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input value="{{ old('banner') }}" name="banner" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>phone</label>
                                    <input value="{{ old('phone', $profile->phone) }}" name="phone" type="tel"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>email</label>
                                    <input value="{{ old('email', $profile->email) }}" name="email" type="email"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>address</label>
                                    <input value="{{ old('address', $profile->address) }}" name="address" type="text"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea name="description" class="summernote">
                                        {{ old('description', $profile->description) }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>facebook url</label>
                                    <input value="{{ old('facebook_link', $profile->facebook_link) }}" name="facebook_link"
                                        type="url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>twitter url</label>
                                    <input value="{{ old('twitter_link', $profile->twitter_link) }}" name="twitter_link"
                                        type="url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>instagram url</label>
                                    <input value="{{ old('instagram_link', $profile->instagram_link) }}"
                                        name="instagram_link" type="url" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
