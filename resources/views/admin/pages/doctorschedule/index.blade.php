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
                            <h3 class="page-title">{{ __('pages.add_doctorschedule') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">{{ __('pages.doctorschedules') }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="{{ route('doctorschedule.upsert') }}" class="btn btn-primary float-end mt-2">{{ __('pages.add_doctorschedule') }}</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table  class="table table-hover table-center mb-0"  filter="{{ route('doctorschedule.filter') }}">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ __('pages.day') }}</th>
                                                <th class="text-end">{{ __('pages.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        @foreach($doctorschedules as $doctorschedule)
                                            <tr class="record">
                                                <td>{{ $doctorschedule->id }}#</td>
                                                <td>{{ $doctorschedule->schedule->day }}</td>
                                                <td  class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('doctorschedule.upsert',['doctorschedule' => $doctorschedule->id]) }}" class="btn btn-sm bg-success-light" >
                                                            <i class="fe fe-pencil"></i> {{ __('pages.edit') }}
                                                        </a>
                                                        <a   class="btn btn-sm bg-danger-light btn_delete" route="{{ route('doctorschedule.delete',['doctorschedule' => $doctorschedule->id]) }}">
                                                            <i class="fe fe-trash"></i> {{ __('pages.delete') }}
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        @if(!count($doctorschedules))
                                        <td colspan="5">
                                            <p class="mb-0 text-center">{{ __('pages.no_data_to_display') }}</p>
                                        </td>
                                        @endif  
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example" class="mt-2">
                                        <ul class="pagination">
                                            @for($i = 1; $i <= $doctorschedules->lastPage(); $i++)
                                                <li class="page-item"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
                                            @endfor
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>
            </div>	
        </div>
        <!-- /Page Wrapper -->
    </div>
@endsection

@section('js')

@endsection