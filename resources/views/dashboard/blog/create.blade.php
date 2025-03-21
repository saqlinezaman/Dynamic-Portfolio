@extends('layouts.dashboardmaster')
@section('content')

{{-- form  --}}
<div class="row p-4 d-flex justify-content-center" >
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Blog Create</h4>
                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data" >
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
                        <select name="category_id" class="form-select">
                            <option value="">Select role</option>
                            @foreach ($categories as $category)
                                <option value=" {{$category->id}} "> {{$category->title}}</option>
                            @endforeach


                        </select>
                        @error('category_id')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- short description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Short description</label>
                        <textarea type="text" class="form-control @error('title') is_invalid @enderror" value="" id="short_description" name="short_description"> </textarea>
                        @error('short_description')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- description --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea type="text" class="form-control @error('title') is_invalid @enderror" value="" id="description" name="description"> </textarea>
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

@endsection
