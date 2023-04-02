@extends('admin.layout.master')
@section('content')
	<div class="main-wrapper">
		<div class="page-wrapper">
			<div class="content container-fluid">
				@if(Auth::user()->role->id == SUPERADMIN)
				<div class="row">
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon text-primary border-primary">
										<i class="fe fe-users"></i>
									</span>
									<div class="dash-count">
										<div class="teachers_count"></div>
									</div>
								</div>
								<div class="dash-widget-info">
									<h6 class="text-muted">{{ __('pages.teachers')}}</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon text-success">
										<i class="fe fe-users"></i>
									</span>
									<div class="dash-count">
										<div class="preprators_count"></div>
									</div>
								</div>
								<div class="dash-widget-info">
									
									<h6 class="text-muted">{{ __('pages.preprators')}}</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon text-danger border-danger">
										<i class="fe fe-file"></i>
									</span>
									<div class="dash-count">
										<div class="preprations_count"></div>
									</div>
								</div>
								<div class="dash-widget-info">
									
									<h6 class="text-muted">{{ __('pages.preprations')}}</h6>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h5 class="card-title" style="margin-right: -10px;">{{ __('pages.teacher_list')}}</h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>{{ __('pages.teacher_name')}}</th>
											</tr>
										</thead>
										<tbody class="teacher_list">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex">
						<div class="card  card-table flex-fill">
							<div class="card-header">
								<h5 class="card-title" style="margin-right: -10px;">{{ __('pages.preprators_list')}}</h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0">
										<thead>
											<tr>													
												<th>{{ __('pages.preprator_name')}}</th>

											</tr>
										</thead>
										<tbody class="preprator_list">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				@elseif(Auth::user()->role->id == USER)
				<div class="row">
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon text-primary border-primary">
										<i class="fe fe-file"></i>
									</span>
									<div class="dash-count">
										<div class="">{{Auth::user()->used_request}}</div>
									</div>
								</div>
								<div class="dash-widget-info">
									
									<h6 class="text-muted">{{ __('pages.used_request')}}</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon text-danger border-danger">
										<i class="fe fe-file"></i>
									</span>
									<div class="dash-count">
										<div class="">{{Auth::user()->max_request}}</div>
									</div>
								</div>
								<div class="dash-widget-info">
									
									<h6 class="text-muted">{{ __('pages.max_request')}}</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h5 class="card-title" style="margin-right: -10px;">{{ __('pages.prepration_list')}}</h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>{{ __('pages.prepration_name')}}</th>
											</tr>
										</thead>
										<tbody class="prepration_list">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				@elseif(Auth::user()->role->id == PATIENT)
				<div class="row">
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">{{ __('pages.choose_specialites') }}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">{{ __('pages.minor_specialities') }}</li>
								</ul>
							</div>
						</div>
					</div>
					@foreach($specialites as $specialization)
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
								<a href="{{ route('specialization.doctor',['specialization' => $specialization->id]) }}" >					
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fa fa-user-md" aria-hidden="true"></i>
										</span>
										<div class="dash-count">
											<h6 class="text-muted">{{$specialization->name}}</h6>
										</div>
									</div>
								
								</div>
							</a>
							</div>
					</div>
					@endforeach
				</div>
				@endif
			
			</div>			
		</div>
	</div>
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': '{{csrf_token()}}'
		},
		url: "{{ route('data-dashboard') }}",
		method: 'get',
		success: (data) => {
			$('.preprations_count').append(`<h3> ${data['preprations']} </h3>`);
			$('.teachers_count').append(`<h3> ${data['teachers'].length} </h3>`);
			$('.preprators_count').append(`<h3> ${data['preprators'].length} </h3>`);
			$('.prepration_user_count').append(`<h3> ${data['prepration_user'].length} </h3>`);
			if(data['preprations'] == 0){
				$('.preprations_count').append(`
					<td colspan="6">
						<p class="mb-0 text-center">{{ __('pages.no_data_to_display') }}</p>
					</td>
				`);
			}
			data['teachers'].forEach(function(teacher){
				$('.teacher_list').append(`
					<tr>
						<td>
							<a href="#" class="avatar avatar-sm me-2">
								<img class="avatar-img rounded-circle" src="{{ asset('assets/img/user.jpg')}}" alt="">
							</a>
							${teacher['name']}
						</td>
					</tr>
				`);
			});
			
			data['preprators'].forEach(function(preprator){
				$('.preprator_list').append(`
					<tr>
						<td>
							<a href="#" class="avatar avatar-sm me-2">
								<img class="avatar-img rounded-circle" src="{{ asset('assets/img/user.jpg')}}" alt="">
							</a>
							${preprator['name']}
						</td>
					</tr>
				`);
			});
			data['logs'].forEach(function(prepration){
				$('.prepration_list').append(`
					<tr>
						<td>
							<a href="#" class="avatar avatar-sm me-2">
								<img class="avatar-img rounded-circle" src="{{ asset('assets/img/user.jpg')}}" alt="">
							</a>
							${prepration['message']}
						</td>
						<td>
							${Date(prepration['created_at'])}
						</td>
					</tr>
				`);
			});

		}
	});
	
</script>
@endsection