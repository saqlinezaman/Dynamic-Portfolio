@extends('layouts.dashboardmaster')
@section('content')

{{-- form  --}}
<div class="row p-4" >
    <div class="col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Blog Create</h4>
                <form action="{{route('blog.create')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Blog title</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="Input your Blog titel " value="" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Blog slug</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your Blog slug " value="" name="slug">
                    </div>
                    {{-- categories --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">categories</label>
                        <select name="user_id" class="form-select">
                            <option value="">Select role</option>
                            @foreach ($categories as $category)
                                <option value=" {{$category->id}} "> {{$category->title}}</option>
                            @endforeach


                        </select>
                        @error('role')
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

                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
