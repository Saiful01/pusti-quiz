@extends("layouts.frontend")
@section('title', 'Challenge.gov.bd')
@section("content")

<div class="container-fluid ">
    <img src="{{$applicant->file}}" width="100%">
</div>
<div class="container-fluid ">
    <div class="row mb-5">
        <div class="col-md-6 col-9 text-center mt-5">
            <a class="btn btn-danger text-center" href="{{$applicant->file}}" download="certificate"><i class="fa fa-download" aria-hidden="true"></i> সার্টিফিকেট  ডাউনলোড করুন </a>
        </div>
        <div class="col-md-6 col-3  mt-5">
            {!! $shareComponent !!}
        </div>
    </div>
</div>

@endsection



