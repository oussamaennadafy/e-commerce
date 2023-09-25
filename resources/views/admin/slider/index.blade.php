@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi there!</h2>
            <p class="section-lead">here is all slider that is shown to the client</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sliders</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.create') }}"
                                    class="btn btn-primary d-flex align-items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    <span class="d-inline-block">create New</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="table-1_wrapper"
                                    class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped dataTable no-footer" id="table-1">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Banner</th>
                                                        <th>Type</th>
                                                        <th>Title</th>
                                                        <th>price</th>
                                                        <th>button url</th>
                                                        <th>serial</th>
                                                        <th>status</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sliders as $slider)
                                                        <tr>
                                                            <td style="max-width: 100px;">
                                                                <img class="w-100" src="{{ asset($slider->banner) }}">
                                                            </td>
                                                            <td>{{ $slider->type }}</td>
                                                            <td>{{ $slider->title }}</td>
                                                            <td>{{ $slider->starting_price }}</td>
                                                            <td>
                                                                <a target="_blank" href="{{ $slider->btn_url }}">
                                                                    {{ $slider->btn_url }}
                                                                </a>
                                                            </td>
                                                            <td>{{ $slider->serial }}</td>
                                                            <td>
                                                                <div
                                                                    class="badge {{ $slider->status ? 'badge-success' : 'badge-danger' }}">
                                                                    {{ $slider->status ? 'active' : 'inactive' }}
                                                                </div>
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                                    class="btn btn-primary mr-1">Edit</a>
                                                                {{-- <form
                                                                    action="{{ route('admin.slider.destroy', $slider->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        class="btn delete-item btn-danger">Delete</button>
                                                                </form> --}}
                                                                <a href="{{ route('admin.slider.destroy', $slider->id) }}"
                                                                    class="delete-item btn btn-danger">
                                                                    delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- <tr>
                                                        <td class="sorting_1">
                                                            4
                                                        </td>
                                                        <td class="">Input data</td>
                                                        <td class="">Input data</td>
                                                        <td class="">Input data</td>
                                                        <td>2018-01-16</td>
                                                        <td>2018-01-16</td>
                                                        <td>2018-01-16</td>
                                                        <td>
                                                            <div class="badge badge-success">Completed</div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $sliders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
