@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>sub category</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div> --}}
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi there!</h2>
            <p class="section-lead">Here you can edit the sub category</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>edit sub Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', $subCategory->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="Category">Category</label>
                                    <select name="category" id="Category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option @selected($category->id === $subCategory->category_id) value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>name</label>
                                    <input value="{{ old('name', $subCategory->name) }}" name="name" type="text"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select name="status" id="inputState" class="form-control">
                                        <option {{ $subCategory->status == 1 ? 'selected' : '' }} value="1">active
                                        </option>
                                        <option {{ $subCategory->status == 0 ? 'selected' : '' }} value="0">inactive
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
