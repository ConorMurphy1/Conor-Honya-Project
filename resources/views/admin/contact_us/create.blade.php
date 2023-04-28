@extends('welcome')
@section('content')
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Contact us</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                                <form action="{{ route('contact-us.store') }}" method="post" enctype="multipart/form-data">
                            <div class="tt-wrapper-inner">
                                <h5 class="hk-sec-title">Contact Us</h5>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"  required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Feedback</label>
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Feedback</span>
                                            </div>
                                            <textarea required class="form-control" aria-label="With textarea" name="feedback" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <a href="{{route('home')}}" class="btn btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection

@section('scripts')
    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true //to close picker once year is selected
        });
    </script>
@endsection
