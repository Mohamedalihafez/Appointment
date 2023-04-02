@extends('admin.layout.master')
@section('content')
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __('pages.doctors') }}</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    @foreach ($doctors as $doctor)
                    <div class="col-4">
                        <div class="card">
                            <div class="d-flex justify-content-center p-3">
                                <img src="https://ui-avatars.com/api/?name={{ $doctor->name }}&size=200&background=DC3545&color=fff"
                                    class="align-center card-img-top img-fluid rounded-circle" alt="..." style="width: 150px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $doctor->name }}</h5>
                                <p class="card-text text-center">{{__('pages.email')}} : {{ $doctor->email }}</p>
                                <p class="card-text text-center">{{__('pages.Phone')}} : {{ $doctor->phone }} {{$doctor->country_code}}</p>
                            </div>
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo{{ $doctor->id }}" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                          {{__('pages.time_table')}}
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo{{ $doctor->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <div class="list-group">
                                                @if ($doctor->doctorSchedules->count() > 0)
                                                    @foreach ($doctor->doctorSchedules as $schedule)
                                                        <form method="post" enctype="multipart/form-data" action="{{ route('appointment.add') }}" class="ajax-form" redirect="{{ route('appointment') }}" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                                            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}"/>
                                                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}"/>
                                                            @csrf
                                                            <div class="submit-section">
                                                                <button class=" btn btn-outline-primary text-start submit-btn" type="submit" name="form_submit" placeholder="submit">  {{ $schedule->day }}, {{__('pages.from')}} {{ $schedule->startTime }} -
                                                                    {{ $schedule->endTime }}</button>
                                                            </div>
                                                        </form>
                                                    @endforeach
                                                @else
                                                    <p class="text-danger"><strong>Dokter ini tidak memiliki jadwal.</strong></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach		
                </div>
            </div>	
        </div>
        <!-- /Page Wrapper -->
    </div>
@endsection

@section('js')

@endsection