@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
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
                            <h4>Create Slider</h4>

                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('admin.slider.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input value="{{ old('banner') }}" name="banner" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input value="{{ old('type') }}" name="type" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input value="{{ old('title') }}" name="title" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Starting Price</label>
                                    <input value="{{ old('starting_price') }}" name="starting_price" type="number"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Button Url</label>
                                    <input value="{{ old('btn_url') }}" name="btn_url" type="url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input value="{{ old('serial') }}" name="serial" type="number" class="form-control">
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
