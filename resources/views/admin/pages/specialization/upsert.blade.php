@extends('admin.layout.master')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="content container-fluid">		
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">{{ __('pages.add_specialization_minor') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:(0);">{{ __('pages.minor_specialities') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('pages.add_specialization_minor') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->        
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body custom-edit-service">                 
                                    <!-- Add Blog -->
                                    <form method="post" enctype="multipart/form-data" action="{{ route('specialization.modify') }}" class="ajax-form" redirect="{{ route('specialization') }}" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                    @csrf
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="mb-2">{{ __('pages.specialization_name') }}</label>
                                                        <input class="form-control" type="text" name="name" value="@isset($specialization->id){{$specialization->name}}@endisset" placeholder="{{ __('pages.specialization_name') }}">
                                                        <p class="error error_name"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @isset($specialization->id)
                                            <input type="hidden" value="{{$specialization->id}}" name="id">
                                        @endisset
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn" type="submit" name="form_submit" placeholder="submit">{{ __('pages.submit') }}</button>
                                        </div>
                                    </form>
                                    <!-- /Add Blog -->
                                </div>
                            </div>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection