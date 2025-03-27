@extends('layouts.dashboardmaster')
@section('content')
<div class="row p-4 d-flex justify-content-center" >
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Testimonials Create</h4>
                <form action="{{route('testimonial.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method("PATCH")
                    {{-- name --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Name </label>
                        <input type="text" class="form-control @error('name') is_invalid @enderror" id="validationCustom01" placeholder="Name" value="{{$testimonial->name}}" name="name">
                        @error('name')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- Occupation --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Occupation</label>
                        <input type="text" class="form-control @error('occupation') is_invalid @enderror" id="validationCustom01" placeholder="Occupation " value="{{$testimonial->occupation}}" name="occupation">
                        @error('occupation')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- stars --}}
                    <div class="row">
                        <label for="validationCustom01" class="form-label">Give Rating</label>
                        <select name="stars" id="stars" class="form-select">
                            <option value="">Select Stars</option>
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ $testimonial->stars == $i ? 'selected' : '' }}>
                                    {{ str_repeat('⭐', $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                        @error('stars')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    {{-- description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea type="text" class="form-control @error('description') is_invalid @enderror" value="" name="description">{{$testimonial->description}}</textarea>
                        @error('description')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/testimonial')}}/{{$testimonial->thumbnail}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
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

@section('script')

@if (session('success'))

<script>
   Toastify({
  text: "{{session('success')}}",
  duration: 4000,
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>
@endif

@endsection
