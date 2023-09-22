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
            <h2 class="section-title">Table</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Slider</h4>

                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input name="" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input name="type" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Starting Price</label>
                                    <input name="price" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Button Url</label>
                                    <input name="button_url" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input name="button_url" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control">
                                        <option>active</option>
                                        <option>inactive</option>
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
