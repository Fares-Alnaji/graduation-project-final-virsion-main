@extends('dashboard.parent')

@section('content')
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
                        <h3 class="card-title">Role ({{ $role->name }}) - Permissions</h3>

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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr id="role_{{ $permission->id }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td><span class="badge bg-success">{{ $permission->guard_name }}</span></td>
                                            <td>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input onclick="performUpdate('{{ $permission->id }}')"
                                                            class="form-check-input" type="checkbox"
                                                            id="permission_{{ $permission->id }}_ched_box"
                                                            @checked($permission->assigned)>
                                                        <label for="permission_{{ $permission->id }}_ched_box">
                                                        </label>
                                                    </div>
                                                </div>
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
    </div>>
    </section>
    <!-- /.content -->
@endsection


<!-- Toastr -->
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

<script>
    function performUpdate(permissionId) {
        axios.put('/dashboard/roles/{{ $role->id }}/permissions', {
                permission_id: permissionId,
            })
            .then(function(response) {
                toastr.success(response.data.message);
            })
            .catch(function(error) {
                toastr.error(error.response.data.message);
            })
    }
</script>
