@extends('dashboard.parent')
@section('content')
    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{ __('Category List') }}</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1"
                                        fill="currentColor"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1"
                                        fill="currentColor" opacity="0.3"></rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1"
                                        fill="currentColor" opacity="0.3"></rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1"
                                        fill="currentColor" opacity="0.3"></rect>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 2-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">{{ __('Actions') }} </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator mb-3 opacity-75"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 menu-state-bg-light-success">
                            <a href="{{ route('categories.create') }}" class="menu-link px-3 bg-light-success"
                                style="color: green">{{ __('Create Product') }}</a>
                            <br>
                        </div>
                        <div class="menu-item px-3 menu-state-bg-light-danger">
                            <a href="{{ route('categories.trash') }}" class="menu-link px-3 bg-light-danger"
                                style="color: red">{{ __('Trash') }}</a>
                            <br>
                        </div>
                        <div class="menu-item px-3">
                            <a href="{{ route('categories.index') }}" class="menu-link px-3">{{ __('back') }}</a>
                            <br>
                        </div>
                    </div>
                    <!--end::Menu 2-->
                    <!--end::Menu-->
                </div>


            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="ps-4 min-w-250px rounded-start">{{ __('Image') }} - {{ __('Id') }} -
                                    {{ __('Name') }}</th>
                                <th class="min-w-200px">{{ __('products count') }}</th>
                                <th class="min-w-200px">{{ __('Description') }}</th>
                                <th class="min-w-125px">{{ __('Status') }}</th>
                                <th class="min-w-125px">{{ __('deleted_at') }}</th>
                                <th class="min-w-200px text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label bg-light">
                                                    <img src="{{ asset('storage/' . $category->image) }}"
                                                        class="h-100 w-100 " alt="">
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#"
                                                    class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $category->id }}
                                                    - {{ $category->name }}</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="#"
                                            class="text-info fw-bold text-hover-primary d-block mb-1 fs-6">{{ $category->products_count }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $category->description }}</a>
                                    </td>
                                    <td>
                                        <div class="status">
                                            @if ($category->status == 'active')
                                                <span class="badge badge-light-success"> {{ __('active') }} </span>
                                            @endif
                                            @if ($category->status == 'draft')
                                                <span class="badge badge-light-danger"> {{ __('draft') }} </span>
                                            @endif
                                            @if ($category->status == 'archived')
                                                <span class="badge badge-light-warning"> {{ __('archived') }} </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $category->created_at }}</a>
                                    </td>
                                    <td class="text-end ">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">
                                            {{ __('Edit') }}
                                        </a>

                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                            class="btn-sm px-4 me-2 gap-2 d-inline-flex " method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-2">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">{{ __('No categories found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>

                        <!--end::Table body-->
                    </table>
                    {{ $categories->links() }}

                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>
        <!--end::Tables Widget 9-->
    @endsection
