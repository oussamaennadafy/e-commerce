@extends('admin.layouts.master')


@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Child Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi there!</h2>
            <p class="section-lead">here is all Child categories that are available for the client</p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Child categories</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.child-category.create') }}"
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
                                                        <th>sub category</th>
                                                        <th>status</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($child_categories as $child_category)
                                                        <tr>
                                                            <td>{{ $child_category->name }}</td>
                                                            <td>{{ $child_category->slug }}</td>
                                                            <td>{{ $child_category->subCategory->category->name }}</td>
                                                            <td>{{ $child_category->subCategory->name }}</td>
                                                            <td>
                                                                <label class="custom-switch mt-2">
                                                                    <input @checked(old('status', $child_category->status)) type="checkbox"
                                                                        name="status" data-id="{{ $child_category->id }}"
                                                                        class="custom-switch-input change-status">
                                                                    <span class="custom-switch-indicator"></span>
                                                                </label>
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('admin.child-category.edit', $child_category->id) }}"
                                                                    class="btn btn-primary mr-1">Edit</a>

                                                                <a href="{{ route('admin.child-category.destroy', $child_category->id) }}"
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
                                    {{ $child_categories->links() }}
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
                fetch("{{ route('admin.child-category.updateStatus') }}", {
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
