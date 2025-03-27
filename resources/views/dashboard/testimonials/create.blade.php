@extends('layouts.dashboardmaster')
@section('content')

{{-- form  --}}
<div class="row p-4 d-flex justify-content-center" >
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Testimonials Create</h4>
                <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- name --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Name </label>
                        <input type="text" class="form-control @error('name') is_invalid @enderror" id="validationCustom01" placeholder="Name" value="" name="name">
                        @error('name')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- Occupation --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Occupation</label>
                        <input type="text" class="form-control @error('occupation') is_invalid @enderror" id="validationCustom01" placeholder="Occupation " value="" name="occupation">
                        @error('occupation')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- stars --}}
                    <div class="row">
                        <label for="validationCustom01" class="form-label">Give Rating</label>
                        <select name="stars" id="stars" class="form-select">
                            <option value="">Select Stars</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>
                       </div>
                    {{-- description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea type="text" class="form-control @error('description') is_invalid @enderror" value="" name="description"> </textarea>
                        @error('description')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/default/default.png')}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Blog thumbnail</label>
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
