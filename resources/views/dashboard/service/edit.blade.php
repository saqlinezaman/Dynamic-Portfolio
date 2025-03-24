@extends('layouts.dashboardmaster')
@section('content')
<div class="row p-4 d-flex justify-content-center" >
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center p-2 bg-success text-white items-center">Edit Service </h3>
                <form action="{{route('service.update', $service->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH');
                    {{-- titel --}}
                    <div class="mb-3 mt-5">
                        <label for="validationCustom01" class="form-label"> Blog title</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="Input your Blog titel " value=" {{$service->title}} " name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Service description</label>
                        <textarea type="text" class="form-control" id="validationCustom01" placeholder="Input your service description" value="" name="description">{{$service->description}}</textarea>
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
