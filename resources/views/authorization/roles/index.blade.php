@extends('dashboard.parent')

@section('content')
    <!-- Main content -->

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card card-flush ">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span
                                    class="path2"></span></i> <input type="text"
                                data-kt-permissions-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13" placeholder="Search Roles:">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_permissions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                                id="kt_permissions_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Name: activate to sort column ascending" style="width: 245.225px;">
                                            Id</th>
                                        <th class="min-w-125px sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="Assigned to" style="width:245.225px;">Name</th>
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Created Date: activate to sort column ascending"
                                            style="width:245.225px;">Type</th>
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Created Date: activate to sort column ascending"
                                            style="width:245.225px;">Permissions</th>
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Created Date: activate to sort column ascending"
                                            style="width:245.225px;">Settings</th>

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($roles as $role)
                                        <tr id="role_{{ $role->id }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td><a href="{{ route('role.edit-permissions', $role->id) }}" type="button"
                                                    class="btn btn-block btn-outline-primary btn-sm">({{ $role->permissions_count }})
                                                    Permission/s</a></td>
                                            <td><span class="badge bg-success">{{ $role->guard_name }}</span></td>
                                            <td>
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">Edit</a>
                                                <button
                                                    class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-2"
                                                    type="button" onclick="deleteRoles('{{ $role->id }}')">
                                                    Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $permissions->links() }}     --}}
                        </div>

                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>

        </div>
        <!--end::Post-->
    </div>
    </section>
    <!-- /.content -->
@endsection

<script src="{{ asset('cms/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script>
    function deleteRoles(id) {
        axios.delete(`/dashboard/roles/${id}`)
            .then(function(response) {
                document.getElementById(`role_${id}`).remove();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            })
            .catch(function(error) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: error.response.data.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            })
    }

    function showMessage(icon, message) {
        Swal.fire({
            position: 'center',
            icon: icon,
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
