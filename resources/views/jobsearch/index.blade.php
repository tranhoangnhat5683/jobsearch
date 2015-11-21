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
								<div class="form-group col-md-12">
									<label>Characteristics</label>
									<input type="text" class="form-control input-lg" placeholder="..." autofocus>
								</div> 
								
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Skill</label>
									<input type="text" class="form-control input-lg" id="input-skill" multiple="multiple" placeholder="Nhập tính cách cần tìm...">
								</div> 
								<div class="form-group col-md-6">
									<label>Location</label>
									<select class="form-control js-example-basic-multiple" id="input-location" multiple="multiple">
										<option>Hồ Chí Minh</option>
										<option>Hà Nội</option>
										<option>Phú Yên</option>
										<option>Đà Lạt</option>
										<option>Mỹ Tho</option>
									</select>
								</div>

							</div>
							<div class="text-right">
								<a href="/list" class="btn btn-lg blue text-right">
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
