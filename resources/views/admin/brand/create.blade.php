@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div> --}}
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi there!</h2>
            <p class="section-lead">Here you can create a new brand</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Brand</h4>

                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('admin.brand.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>logo</label>
                                    <input value="{{ old('logo') }}" name="logo" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>name</label>
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">is Featured</label>
                                    <select name="is_featured" id="inputState" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">yes</option>
                                        <option value="0">no</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select name="status" id="inputState" class="form-control">
                                        <option value="1">active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
