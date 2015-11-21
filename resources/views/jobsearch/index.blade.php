@extends('layouts.master')


@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content page-content-hack">
		<div class="job-finder-box container" id="job-finder-box">
			<div class="job-finder-content">
				<div class="job-finder-form">
					<h1 class="text-center">Find Employee <strong>Human Up!</strong></h1>
					<div class="form-content">
						<form class="" action="" method="get" accept-charset="utf-8">
							<div class="row">
								<div class="form-group col-md-6">
									<label>Characteristics</label>
									<input type="text" class="form-control input-lg" placeholder="Nhập tính cách cần tìm...">
								</div> 
								<div class="form-group col-md-6">
									<label>Skill</label>
									<input type="text" class="form-control input-lg" id="input-skill" multiple="multiple" placeholder="Nhập tính cách cần tìm...">
								</div> 
								<!-- <div class="form-group col-md-12">
									<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">
										Careful </button>
									<button type="button" class="btn btn-default active" data-toggle="button" aria-pressed="true">
												Active </button>
									<button type="button" class="btn red active" data-toggle="button" aria-pressed="true">
												Open </button>
									<button type="button" class="btn blue active" data-toggle="button" aria-pressed="true">
												Teamwork </button>
								</div> -->
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Categories</label>
									<select class="form-control js-example-basic-multiple" id="input-category">
										<option>Công Nghệ Thông tin</option>
										<option>Accounting</option>
										<option>Arts/Design</option>
										<option>Architecture/Interior Design</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Location</label>
									<select class="form-control js-example-basic-multiple" id="input-location">
										<option>Hồ Chí Minh</option>
										<option>Hà Nội</option>
										<option>Phú Yên</option>
										<option>Đà Lạt</option>
										<option>Mỹ Tho</option>
									</select>
								</div>

							</div>
							<div class="row">
								<div class="form-group col-sm-6 form-md-line-input">
									<label class=" control-label" for="form_control_1">Gender</label>
									<div class="">
										<div class="md-radio-inline">
											<div class="md-radio">
												<input type="radio" id="radio53" name="gender" class="md-radiobtn" checked="">
												<label for="radio53">
												<span class="inc"></span>
												<span class="check"></span>
												<span class="box"></span>
												All </label>
											</div>
											<div class="md-radio">
												<input type="radio" id="radio54" name="gender" class="md-radiobtn" >
												<label for="radio54">
												<span></span>
												<span class="check"></span>
												<span class="box"></span>
												Male </label>
											</div>
											<div class="md-radio">
												<input type="radio" id="radio55" name="gender" class="md-radiobtn">
												<label for="radio55">
												<span></span>
												<span class="check"></span>
												<span class="box"></span>
												Female </label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-sm-6 form-md-line-input">
									<label class=" control-label" for="form_control_2">Level</label>
									<div class="">
										<div class="md-radio-inline">
											<div class="md-radio">
												<input type="radio" id="radio56" name="level" class="md-radiobtn" checked="">
												<label for="radio56">
												<span class="inc"></span>
												<span class="check"></span>
												<span class="box"></span>
												Junior </label>
											</div>
											<div class="md-radio">
												<input type="radio" id="radio57" name="level" class="md-radiobtn" >
												<label for="radio57">
												<span></span>
												<span class="check"></span>
												<span class="box"></span>
												Senior </label>
											</div>
											<div class="md-radio">
												<input type="radio" id="radio58" name="level" class="md-radiobtn">
												<label for="radio58">
												<span></span>
												<span class="check"></span>
												<span class="box"></span>
												Manager </label>
											</div>
										</div>
									</div>
								</div>
							</div>							
							<div class="text-right">
								<a href="javascript:;" class="btn btn-lg blue text-right">
									Search <i class="fa fa-search"></i>
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
<!-- END CONTENT -->
@endsection

@section('script')
<script>
	jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
    });
	$("#input-location").select2({
		placeholder: "Select a location",
		allowClear: true,
		maximumSelectionLength: 4
	});
	$("#input-category").select2({
		placeholder: "All category",
		allowClear: true,
		maximumSelectionLength: 3
	});
	$("#input-skill").select2({
		placeholder: "Select a skill",
		allowClear: true,
		maximumSelectionLength: 4
	});
</script>
@endsection
