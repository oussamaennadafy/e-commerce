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
            <p class="section-lead">here is all brands that are available in the store</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Brands</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.brand.create') }}"
                                    class="btn btn-primary d-flex align-items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    <span class="d-inline-block">create New</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped dataTable no-footer" id="table-1">
                                                <thead>
                                                    <tr role="row">
                                                        <th>logo</th>
                                                        <th>name</th>
                                                        <th>slug</th>
                                                        <th>is featured</th>
                                                        <th>status</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($brands as $brand)
                                                        <tr>
                                                            <td>
                                                                <img height="50" src="{{ asset($brand->logo) }}"
                                                                    alt="{{ $brand->name }} logo">
                                                            </td>
                                                            <td>{{ $brand->name }}</td>
                                                            <td>{{ $brand->slug }}</td>
                                                            <td>
                                                                <div
                                                                    class="badge badge-{{ $brand->is_featured ? 'success' : 'warning' }}">
                                                                    {{ $brand->is_featured ? 'yes' : 'no' }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label class="custom-switch mt-2">
                                                                    <input @checked(old('status', $brand->status)) type="checkbox"
                                                                        name="status" data-id="{{ $brand->id }}"
                                                                        class="custom-switch-input change-status">
                                                                    <span class="custom-switch-indicator"></span>
                                                                </label>
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                                                    class="btn btn-primary mr-1">Edit</a>

                                                                <a href="{{ route('admin.brand.destroy', $brand->id) }}"
                                                                    class="delete-item btn btn-danger">
                                                                    delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $brands->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.change-status').forEach(function(el) {
            el.addEventListener('change', function(e) {
                const status = this.checked;
                const id = this.getAttribute('data-id');
                fetch("{{ route('admin.brand.updateStatus') }}", {
                        method: "PATCH",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        body: JSON.stringify({
                            status,
                            id
                        })

                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            toastr.success(data.message)
                            // Swal.fire(
                            //     'updated',
                            //     data.message,
                            //     'success'
                            // )
                        } else if (data.status === "error") {
                            Swal.fire(
                                "can't update",
                                data.message,
                                'error'
                            )
                        }
                    })
            })
        })
    </script>
@endpush
