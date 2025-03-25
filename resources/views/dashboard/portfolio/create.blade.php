@extends('layouts.dashboardmaster')
@section('content')

{{-- form  --}}
<div class="row p-4 d-flex justify-content-center" >
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Portfolio Create</h4>
                <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Portfolio title</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="Input your Portfolio titel " value="" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/default/default.png')}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Portfolio thumbnail</label>
                        <input onchange="document.querySelector('#masudMama').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="validationCustom01" value="" name="thumbnail">
                        @error('thumbnail')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
