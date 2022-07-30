@extends('layouts.admin')

@section('css-app')

    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/admin/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/admin/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/css/adminlte.min.css">
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- /.card -->
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h4 class="mt-5 ">Custom Content Above</h4>
                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">

                        @foreach(['az','ru','en'] as $language)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->index == 0) active @endif" id="locale-{{$language}}"
                                   data-toggle="pill" href="#{{$language}}" role="tab" aria-controls="{{$language}}"
                                   aria-selected="true">{{\Illuminate\Support\Str::ucfirst($language)}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{route('admin.sliders.update',['id' => $id])}}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="tab-content" id="custom-content-above-tabContent">

                            @foreach($slider as  $sl)


                                <div class="tab-pane fade @if($loop->index == 0) show active @endif"
                                     id="{{$sl->locale}}" role="tabpanel" aria-labelledby="locale-{{$sl->locale}}">
                                    <input title="" class="form-control" type="text" name="title[{{$sl->locale}}]"
                                           value="{{$sl->title}}">
                                    <label for="desc{{$sl->locale}}">Description ({{$sl->locale}})</label>
                                    <textarea name="description[{{$sl->locale}}]" id="desc{{$sl->locale}}"
                                              class="form-control" cols="30" rows="10">{{$sl->description}}</textarea>


                                </div>
                            @endforeach

{{--                            @if(!is_null($sl->image))--}}
{{--                                <img src="{{\Illuminate\Support\Facades\Storage::url($sl->image)}}" alt="#" class="my-3 w-25 h-25">--}}

{{--                                <a href="{{route('admin.sliders.dltimg', ['id' => $id])}}" class="text-decoration-none">--}}
{{--                                    Delete image--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">--}}
{{--                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>--}}
{{--                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}

                        </div>

                        <button class="btn-btn-primary mt-5" type="submit">Save</button>
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
