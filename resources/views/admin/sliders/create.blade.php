@extends('layouts.admin')

@section('css-app')

    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/admin/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/admin/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/css/adminlte.min.css">

    <style>

        .in-valid {
            border: 1px solid red;
        }

    </style>


@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /.card -->
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h4 class="mt-5 ">Custom Content Above</h4>
                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">

                        @foreach(['az','ru','en'] as $language)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->index == 0) active @endif" id="locale-{{$language}}" data-toggle="pill" href="#{{$language}}" role="tab" aria-controls="{{$language}}" aria-selected="true">{{\Illuminate\Support\Str::ucfirst($language)}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{route('admin.sliders.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="tab-content" id="custom-content-above-tabContent">

                            @foreach(['az','en','ru'] as  $lang)

                                <div class="tab-pane fade @if($loop->index == 0) show active @endif" id="{{$lang}}" role="tabpanel" aria-labelledby="locale-{{$lang}}">
                                    <input title="" class="form-control @error('title.'.$lang) in-valid @enderror" type="text" name="title[{{$lang}}]" value="{{old('title.'.$lang)}}" placeholder="Title {{$lang}}">
                                    <label for="desc{{$lang}}">Description ({{$lang}})</label>
                                    <textarea name="description[{{$lang}}]" id="desc{{$lang}}"  class="form-control" cols="30" rows="10" placeholder="Description {{$lang}}">{{old('description.'.$lang)}}</textarea>
                                </div>

                            @endforeach
                             <label for="category">Categories</label>
                            <select class="form-control" name="category_id" id="category">
                                <option value="">SELECT Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->category_id}}" {{old('category_id') == $category->category_id ? 'selected' : null}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <button  class="btn-btn-primary mt-5" type="submit">Save</button>
                    </form>


                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection

@section('js-app')

    <script src="/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin/js/demo.js"></script>
@endsection

