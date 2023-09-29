@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi there!</h2>
            <p class="section-lead">here is all sub categories that are available for the client</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>sub categories</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.sub-category.create') }}"
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
                                                        <th>name</th>
                                                        <th>slug</th>
                                                        <th>category</th>
                                                        <th>status</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sub_categories as $sub_category)
                                                        <tr>
                                                            <td>{{ $sub_category->name }}</td>
                                                            <td>{{ $sub_category->slug }}</td>
                                                            <td>{{ $sub_category->category->name }}</td>
                                                            <td>
                                                                <label class="custom-switch mt-2">
                                                                    <input @checked(old('status', $sub_category->status)) type="checkbox"
                                                                        name="status" data-id="{{ $sub_category->id }}"
                                                                        class="custom-switch-input change-status">
                                                                    <span class="custom-switch-indicator"></span>
                                                                </label>
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('admin.sub-category.edit', $sub_category->id) }}"
                                                                    class="btn btn-primary mr-1">Edit</a>

                                                                <a href="{{ route('admin.sub-category.destroy', $sub_category->id) }}"
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
                                    {{ $sub_categories->links() }}
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
                fetch(`${window.location.href}/${id}/update-status`, {
                        method: "PATCH",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        body: JSON.stringify({
                            status
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            toastr.success(data.message)
                        } else if (data.status === "error") {
                            Swal.fire(
                                "can't delete",
                                data.message,
                                'error'
                            )
                        }
                    })
            })
        })
    </script>
@endpush
