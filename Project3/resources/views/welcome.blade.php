@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="text-center mt-5">Find the Best Programming Courses & Tutorials</h1>
    <div class="text-center">
        <form class="form-inline active-cyan-3 active-cyan-4">
            <i class="fas fa-search fa-2x" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="search"
                   style="width: 70%; border: 0.1px solid #5a6268; border-radius: 4px;box-shadow: 1px 1px 8px gray; padding: 19px 20px; "
                   placeholder="Search for the language you want to learn: PHP, Python, Javascript,.....">
        </form>
    </div>
</div>
    <div class="container-fluid col-md-10 col-md-offset-1">
        <div class="row"style="justify-content: space-evenly;" id="courses">

        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function getTechnologies() {
        $.get('api/ ', function (data) {
            console.log(data);
            $('#courses').html('');
            $.each(data.data, function( index, value ) {
                    $('#courses').append(
                        '<div class="col-md-4 courses-style" style="display: flex; align-items: center; max-width: 30%">' +
                        '<img class="img-fluid" style="width:50px;" href="/tutorials/'+value.name+'"src="'+value.img+'">'+
                        '<a class="col-md-12" href="/tutorials/'+value.name+'">'+value.name+'</a>' +
                        '</div>');
                });
            }
        );
    }


    $(document).ready(function () {
        getTechnologies();
    })
</script>

