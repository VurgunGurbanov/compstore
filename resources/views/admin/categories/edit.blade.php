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
                                <a class="nav-link @if($loop->index == 0) active @endif" id="locale-{{$language}}" data-toggle="pill" href="#{{$language}}" role="tab" aria-controls="{{$language}}" aria-selected="true">{{\Illuminate\Support\Str::ucfirst($language)}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{route('admin.categories.update',['id' => $category->id])}}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="tab-content" id="custom-content-above-tabContent">

                            @foreach($category->translations as  $translation)

                                <div class="tab-pane fade @if($loop->index == 0) show active @endif" id="{{$translation->locale}}" role="tabpanel" aria-labelledby="locale-{{$translation->locale}}">
                                    <input title="" class="form-control" type="text" name="title[{{$translation->locale}}]" value="{{$translation->title}}">
                                </div>
                            @endforeach
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
