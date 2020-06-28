@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <h1 class="text-center mt-5">Find the Best Programming Courses & Tutorials</h1>
        <div class="text-center">
            <form class="form-inline active-cyan-3 active-cyan-4">
                <i class="fas fa-search fa-2x" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="search" id="query" name="query"
                       style="width: 70%; border: 0.1px solid #5a6268; border-radius: 4px;box-shadow: 1px 1px 8px gray; padding: 19px 20px;"
                       placeholder="Search for the language you want to learn: PHP, Python, Javascript,.....">
            </form>
        </div>
    </div>
    <div class="container-fluid col-md-10 col-md-offset-1">
        <div class="row justify-content-around" id="courses">
            @foreach($programming as $program)
                <div class="col-md-4 courses-style bg-white d-flex align-items-center" style="max-width: 30%">
                    <a class="col-md-12 text-decoration-none text-danger font-weight-bolder" href="{{URL::to('tutorials')}}/{{$program->technology_name}}">
                        <img class="img-fluid mr-2" style="width:50px;" src="{{$program->img}}" />
                        {{$program->technology_name}}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#query').on('keyup', function () {
                $.ajax({
                    url: "{{URL::to('api/')}}",
                    data: {"query": $('#query').val(), ' _token': '{{ csrf_token() }}'},
                    dataType: "json",
                    method: "GET",
                }).done(function (data) {
                    $('#courses').html("");
                    $.each(data.searchData, function (index, value) {
                        $("#courses").append(
                            '<div class="col-md-4 courses-style d-flex align-items-center" style="max-width: 30%">' +
                            '<img class="img-fluid mr-2" style="width:50px;" href="/tutorials/' + value.technology_name + '"src="' + value.img + '">' +
                            '<a class="col-md-12 text-decoration-none text-danger" href="/tutorials/' + value.technology_name + '">' + value.technology_name + '</a>' +
                            '</div>');
                    })
                })
            });
        })
    </script>
@endsection

