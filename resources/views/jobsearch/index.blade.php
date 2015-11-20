@extends('layouts.master')


@section('content')
<div class="page-content-wrapper">
	<div class="page-content page-content-hack">
		<div class="job-finder-box container" id="job-finder-box">
			<div class="job-finder-content">
				<div class="job-finder-form">
					<h1 class="text-center">Find Employee <br class="visible-xs"><strong>Human Up!</strong></h1>
					<div class="form-content">
						<form class="" action="" method="get" accept-charset="utf-8">
							<div class="row">
								<div class="form-group col-md-12">
									<label>Characteristics</label>
									<input type="text" class="form-control input-lg" placeholder="Nhập tính cách cần tìm...">
									<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">
										Careful </button>
									<button type="button" class="btn btn-default active" data-toggle="button" aria-pressed="true">
												Active </button>
									<button type="button" class="btn red active" data-toggle="button" aria-pressed="true">
												Open </button>
									<button type="button" class="btn blue active" data-toggle="button" aria-pressed="true">
												Teamwork </button>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Categories</label>
									<select class="form-control js-example-basic-multiple" id="input-category" multiple="multiple">
										<option>Công Nghệ Thông tin</option>
										<option>Accounting</option>
										<option>Arts/Design</option>
										<option>Architecture/Interior Design</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Level</label>
									<select class="form-control" id="input-level" multiple="multiple">
										<option>Junior</option>
										<option>Sennior</option>
										<option>Manager</option>
									</select>
								</div>

							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Location</label>
									<select class="form-control js-example-basic-multiple" multiple="multiple" id="input-location">
										<option>Hồ Chí Minh</option>
										<option>Hà Nội</option>
										<option>Phú Yên</option>
										<option>Đà Lạt</option>
										<option>Mỹ Tho</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Độ Tuổi</label>
									<select class="form-control" id="input-old">
										<option>18 - 24</option>
										<option>25 - 30</option>
										<option>31 - 40</option>
										<option>41 - 50</option>
										<option>Trên 50</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group form-md-line-input">
									<label class="col-md-2 control-label" for="form_control_1">Sex</label>
									<div class="col-md-10">
										<div class="md-radio-inline">
											<div class="md-radio">
												<input type="radio" id="radio53" name="radio2" class="md-radiobtn" checked="">
												<label for="radio53">
												<span class="inc"></span>
												<span class="check"></span>
												<span class="box"></span>
												All </label>
											</div>
											<div class="md-radio">
												<input type="radio" id="radio54" name="radio2" class="md-radiobtn" >
												<label for="radio54">
												<span></span>
												<span class="check"></span>
												<span class="box"></span>
												Male </label>
											</div>
											<div class="md-radio">
												<input type="radio" id="radio55" name="radio2" class="md-radiobtn">
												<label for="radio55">
												<span></span>
												<span class="check"></span>
												<span class="box"></span>
												Female </label>
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
@endsection

@section('script')
<script>
	jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
    });
	$("#input-location").select2({
		placeholder: "Select a location",
		allowClear: true
	});
	$("#input-category").select2({
		placeholder: "All category",
		allowClear: true
	});
	$("#input-level").select2({
		placeholder: "All level",
		allowClear: true
	});
	$("#input-old").select2({
		placeholder: "All old",
		allowClear: true
	});
</script>
@endsection