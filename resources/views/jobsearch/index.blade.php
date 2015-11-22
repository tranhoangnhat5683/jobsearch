@section('content_index')
<!-- BEGIN INDEX CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content page-content-hack">
        <div class="job-finder-box container" id="job-finder-box">
            <div class="job-finder-content">
                <div class="job-finder-form">
                    <h1 class="text-center">FIND HIGH <strong>EQ TALENT!</strong></h1>
                    <div class="form-content">
                        <form class="" action="" method="get" accept-charset="utf-8">
                            <div class="row">
                                <div class="form-group col-md-12 cff-select-custom">
                                    <!-- <label>Characteristics</label> -->
                                    <!-- <input type="text" class="form-control input-lg" id="input-character" placeholder="..." autofocus> -->
                                    <select class="form-control js-example-basic-multiple" id="input-character" multiple="multiple">
                                        @foreach ($characters as $key => $character)
                                        <option value="{{ $key}}">{{ $character}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <!-- <label>Skill</label> -->
                                    <!-- <input type="text" class="form-control input-lg" id="input-skill" multiple="multiple" placeholder="Nhập tính cách cần tìm..."> -->
                                    <select class="form-control js-example-basic-multiple" id="input-skill" multiple="multiple">
                                        @foreach ($skills as $key => $skill)
                                        <option value="{{ $key}}">{{ $skill}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <!-- <label>Location</label> -->
                                    <select class="form-control js-example-basic-multiple" id="input-location" multiple="multiple">
                                        @foreach ($locations as $key => $location)
                                        <option value="{{ $key}}">{{ $location}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="text-center">
                                <a href="javascript:void(0)" id="btn-search" class="btn btn-lg blue text-right" ng-click='search()'>
                                    Search <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END INDEX CONTENT -->
@endsection

@section('script_index')
<script>

    $("#input-location").select2({
        placeholder: "All locations",
        allowClear: true,
        maximumSelectionLength: 4
    });
    $("#input-category").select2({
        placeholder: "All categories",
        allowClear: true,
        maximumSelectionLength: 3
    });
    $("#input-skill").select2({
        placeholder: "All skills",
        allowClear: true,
        maximumSelectionLength: 4
    });

    $("#input-character").select2({
        placeholder: "Enter characters",
        allowClear: true,
        maximumSelectionLength: 5
    });
    $("#input-character").select2("open");
</script>
@endsection
