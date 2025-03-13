@extends('layouts.dashboardmaster')
@section('content')
{{-- form --}}
<div class="row d-flex justify-content-center item-center">
    <div class="col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Category edit</h4>
                <form action="{{route('category.update',$realmadrid->slug)}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category title</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your category titel " value="{{$realmadrid->title}}" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category slug</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your category slug " value="{{$realmadrid->slug}}" name="slug">
                    </div>
                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/category')}}/{{$realmadrid->image}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category image</label>
                        <input onchange="document.querySelector('#masudMama').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="validationCustom01" value="" name="image" >
                        @error('image')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
