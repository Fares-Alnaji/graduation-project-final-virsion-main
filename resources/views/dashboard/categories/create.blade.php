@extends('dashboard.parent')
@section('sub_title', 'create Category')
<link rel="stylesheet" href="/cms/radio.css">
@section('content')

    <div class="col-xl-12 ">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                    <span class="svg-icon svg-icon-1 me-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <h2>{{__('Add New Category')}}</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form  action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    @csrf
                    <x-alert/>
                    <!--begin::Input group-->
                    <div class="mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-3">
                            <span>{{__('Category Image')}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Allowed file types: png, jpg, jpeg." data-bs-original-title="Allowed file types: png, jpg, jpeg." data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image input wrapper-->
                        <div class="mt-1">
                            <!--begin::Image placeholder-->
                            <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-100px h-100px" style="background-image: url('')"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Edit-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="image">
                                    {{-- <input type="hidden" name="avatar_remove"> --}}
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                        </div>
                        <!--end::Image input wrapper-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">{{__('Category Name')}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="name" id="name" value="">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>{{__('Description')}}</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's phone number (optional)." data-bs-original-title="Enter the contact's phone number (optional)." data-kt-initialized="1"></i>
                                </label>
                                <textarea name="description"class="form-control form-control-solid" id="" cols="30" rows="10">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-check form-check-custom form-check-solid form-check-primary">
                            <h4 for="status" class="form">{{__('Status')}}</h4>
                            <div class="container">
                                <form>
                                    <label>
                                        <input type="radio"  name="status" id="status" value="active"    @checked(old('status') == 'active')>
                                        <span>{{__('active')}}</span>
                                    </label>
                                    <label>
                                        <input  type="radio" name="status" id="status" value="draft" @checked(old('status') == 'draft')>
                                        <span>{{__('draft')}}</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="status" value="archived" @checked(old('status') == 'archived')>
                                        <span>{{__('archived')}}</span>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="separator mb-6"></div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">{{__('Cancel')}}</button>
                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                <span class="indicator-label">{{__('Save')}}</span>
                                <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection
