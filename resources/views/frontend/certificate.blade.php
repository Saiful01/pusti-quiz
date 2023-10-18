@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")

<div class="container-fluid ">
    <img src="{{$applicant->file}}" width="100%">
</div>
<div class="container-fluid " style="background: url('../img/form-bg.png') center; background-repeat: no-repeat; height: 200px">
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="row">
                <div class="col-md-6 col-12 text-center mt-5">
                    <a class="btn btn-danger text-center" href="{{$applicant->file}}" download="certificate"><i
                            class="fa fa-download" aria-hidden="true"></i> সার্টিফিকেট ডাউনলোড করুন </a>
                </div>
                <div class="col-md-6 col-12  mt-2">
                    <div class="text-center ">
                        <h6 class="text-danger mb-3">সার্টিফিকেট শেয়ার করেন </h6>
                      <span class="mt-2">{!! $shareComponent !!}</span>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection



