@extends('layouts.dashboardmaster')
@section('content')
    {{-- form  --}}
<div class="row p-4 d-flex justify-content-center" >
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center p-2 bg-success text-white items-center">Edit blog </h3>
                <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH');
                    {{-- titel --}}
                    <div class="mb-3 mt-5">
                        <label for="validationCustom01" class="form-label"> Blog title</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="Input your Blog titel " value=" {{$blog->title}} " name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Blog slug</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your Blog slug " value="{{$blog->slug}}" name="slug">
                    </div>
                    {{-- categories --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">categories</label>
                        <select name="category_id" class="form-select">
                            <option value="">Select role</option>
                            @foreach ($categories as $category)
                               <option {{$category->id == $blog->category_id ? 'selected' : ' '}} value=" {{$category->id}} "> {{$category->title}}</option>
                            @endforeach


                        </select>
                        @error('category_id')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- short description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Short description</label>
                        <textarea type="text" class="form-control @error('title') is_invalid @enderror" value="" id="short_description" name="short_description"> {{$blog->short_description}} </textarea>
                        @error('short_description')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea type="text" class="form-control @error('title') is_invalid @enderror" value="" id="description" name="description"> {{$blog->description}} </textarea>
                        @error('description')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/blog')}}/{{$blog->thumbnail}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
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
{{-- long --}}
<script>
    tinymce.init({
      selector: '#description',
      plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Apr 4, 2025:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>
  {{-- short --}}
<script>

    tinymce.init({
      selector: '#short_description',
      plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Apr 4, 2025:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>

@if (session('edit_success'))

<script>
   Toastify({
  text: "{{session('edit_success')}}",
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
