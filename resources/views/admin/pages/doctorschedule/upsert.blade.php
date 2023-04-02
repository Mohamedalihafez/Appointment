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
                                <h3 class="page-title">{{ __('pages.add_doctorschedule') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:(0);">{{ __('pages.doctorschedules') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('pages.add_doctorschedule') }}</li>
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('doctorschedule.modify') }}" class="ajax-form" redirect="{{ route('doctorschedule') }}" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                    @csrf
                                        <div class="service-fields mb-3">
                                            <div class="table">
                                                <table class="table table-striped table-sm align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" scope="col">No.</th>
                                                            <th class="text-center" scope="col">{{__('pages.day')}}</th>
                                                            <th class="text-center" scope="col">{{__('pages.startTime')}}</th>
                                                            <th class="text-center" scope="col">{{__('pages.breakTime')}}</th>
                                                            <th class="text-center" scope="col">{{__('pages.endTime')}}</th>
                                                            <th class="text-center" scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($schedules->count() > 0)
                                                            @foreach ($schedules as $schedule)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                                                    <td class="text-center">{{ $schedule->day }}</td>
                                                                    <td class="text-center">{{ $schedule->startTime }}</td>
                                                                    <td class="text-center">{{ $schedule->breakTime }}</td>
                                                                    <td class="text-center">{{ $schedule->endTime }}</td>
                                                                    <td class="text-end">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" name="schedule_id[]"    @isset($doctorschedule->id) @if ($doctorschedule->schedule_id == $schedule->id) checked @endif  @endisset  value="{{ $schedule->id }}" type="checkbox" id="flexSwitchCheckDefault">
                                                                          </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td class="text-center" colspan="5">NO DATA</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}" >
                                        @isset($doctorschedule->id)
                                            <input type="hidden" value="{{$doctorschedule->id}}" name="id">
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