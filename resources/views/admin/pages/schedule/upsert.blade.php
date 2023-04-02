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
                                <h3 class="page-title">{{ __('pages.add_schedule') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:(0);">{{ __('pages.schedules') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('pages.add_schedule') }}</li>
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('schedule.modify') }}" class="ajax-form" redirect="{{ route('schedule') }}" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                    @csrf
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                          
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label for="day">{{__('pages.days')}}</label>
                                                        <select name="day" id="day" class="form-select "
                                                            required>
                                                            <option selected disabled hidden>{{__('pages.select_day')}}</option>
                                                            <option @if ($schedule->day == 'الاثنين') selected @endif value="الاثنين">{{__('pages.monday')}}</option>
                                                            <option @if ($schedule->day == 'الثلاثاء') selected @endif value="الثلاثاء">{{__('pages.tuesday')}}</option>
                                                            <option @if ($schedule->day == 'الأربعاء') selected @endif value="الأربعاء">{{__('pages.wednesday')}}</option>
                                                            <option @if ($schedule->day == 'الخميس') selected @endif value="الخميس">{{__('pages.thrusday')}}</option>
                                                            <option @if ($schedule->day == 'الجمعه') selected @endif value="الجمعه">{{__('pages.friday')}}</option>
                                                            <option @if ($schedule->day == 'السبت') selected @endif value="السبت">{{__('pages.saturday')}}</option>
                                                            <option @if ($schedule->day == 'الأحد') selected @endif value="الأحد">{{__('pages.sunday')}}</option>
                                                        </select>
                                                        <p class="error error_day"></p>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label for="startTime">{{__('pages.startTime')}}</label>
                                                        <input type="time" name="startTime" id="startTime"
                                                            class="form-control" autofocus
                                                            value="@isset($schedule->id){{$schedule->startTime}}@endisset" required>
                                                            <p class="error error_startTime"></p>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label for="breakTime">{{__('pages.breakTime')}}</label>
                                                        <input type="time" name="breakTime" id="breakTime"
                                                            class="form-control "
                                                            value="@isset($schedule->id){{$schedule->breakTime}}@endisset">
                                                            <p class="error error_breakTime"></p>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label for="endTime">{{__('pages.endTime')}}</label>
                                                        <input type="time" name="endTime" id="endTime"
                                                            class="form-control" value="@isset($schedule->id){{$schedule->endTime}}@endisset"
                                                            required>
                                                            <p class="error error_endTime"></p>

                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>

                                        @isset($schedule->id)
                                            <input type="hidden" value="{{$schedule->id}}" name="id">
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