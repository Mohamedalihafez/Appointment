@extends('admin.layout.master')
@section('content')
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="main-wrapper">
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">{{ __('pages.my_profile')}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">{{ __('pages.dashboard')}}</a></li>
									<li class="breadcrumb-item active">{{ __('pages.my_profile')}}</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto user-profile-image profile-image position-relative">
                                        <img 
                                            src="{{ Auth::user()->picture ?
													asset('/users/'.Auth::user()->id.'/'.Auth::user()->picture->name) : 
													' '
												}}" 
                                            class="img-profile" alt="User Image"
                                        >
										@if (!Auth::user()->picture)
                                        	<div class="profile_letters">{{ Auth::user()->avatar_name }}</div>
										@endif
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-2">{{ Auth::user()->name }}</h4>
										<h6 class="text-muted">{{ Auth::user()->email }}</h6>
									</div>
								</div>
							</div>
							<div class="tab-content profile-tab-cont">
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span class="text-black mb-3">{{ __('pages.personal_details') }}</span> 
														<a class="edit-link btn btn-primary text-white" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>{{ __('pages.edit')}}</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">{{ __('pages.name')}}</p>
														<p class="col-sm-10 text-black">{{ Auth::user()->name }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">{{ __('pages.email')}}</p>
														<p class="col-sm-10 text-black">{{ Auth::user()->email }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">{{ __('pages.mobile')}}</p>
														<p class="col-sm-10 text-black user_phone">{{ Auth::user()->phone }}</p>
													</div>

												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" swalOnFail="{{ __('pages.wrongdata') }}">
															<div class="modal-header">
																<h5 class="modal-title text-black">{{ __('pages.personal_details') }}</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																@csrf
																<div class="row form-row">
																	<div class="col-12">
																		<div class="form-group">
																			<label class="mb-2 text-black">{{ __('pages.name')}}</label>
																			<input type="text" disabled class="form-control" value="{{ Auth::user()->name }}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label class="mb-2 text-black">{{ __('pages.email')}}</label>
																			<input class="form-control text-start" type="email" disabled class="form-control" value="{{ Auth::user()->email }}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label class="mb-2 text-black">{{ __('pages.mobile')}}</label>
																			<input type="text" value="{{ Auth::user()->phone }}" name="phone" class="phone_change form-control">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<input type="file" class="dropify" user_id="{{Auth::user()->id}}" data-default-file="@if(Auth::user()->picture){{ asset('/users/'.Auth::user()->id.'/'.Auth::user()->picture->name) }}@endif" name="picture"/>
																			<p class="error error_picture"></p>
																		</div>
																	</div>
																</div>
																@isset(Auth::user()->id)
																	<input type="hidden" class="id_user" value="{{Auth::user()->id}}" name="id">
																@endisset
																<button type="submit" class="btn btn-primary w-100 submit-btn">{{ __('pages.submit') }}</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab -->
							</div>
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
        </div>
        <!-- /Page Wrapper -->
@endsection

@section('js')
<script>
    $('.dropify').dropify();

	if($(".img-profile").attr("src") == " "){
		$(".img-profile").addClass("d-none");
	}
	else{
		$(".user-profile-image").removeClass("profile-image");
	}

    $(".submit-btn").on("click", function(){
        let new_phone = $('.phone_change').val();		
		$('.user_phone').text(new_phone);

        let url = $(".img-profile").attr("src");
		let id = $('.dropify').attr("user_id");

		$(this).parents('.modal').modal('hide');
		
        $.ajax({
			url: url,
            headers: { "Cache-Control": "no-cache" },
        }).done(function(){
			if(url == " "){
				$(".img-profile").attr("src", `/users/${id}/picture_${id}.png`);
				$(".user-profile").attr("src", `/users/${id}/picture_${id}.png`);
				$(".user-image").attr("src", `/users/${id}/picture_${id}.png`);
				$('.profile_letters').text("");
            }
            else{
				$(".img-profile").attr("src", url);
				$(".user-image").attr("src", url);
				$(".user-profile").attr("src", url);
            }
			
			$(".img-profile").removeClass("d-none");
			$(".user-profile-image").removeClass("profile-image");
        });
	});
</script>
@endsection