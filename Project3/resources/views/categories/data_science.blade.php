@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Find the Best Programming Courses & Tutorials</h1>
        <div class="text-center">
            <form class="form-inline active-cyan-3 active-cyan-4">
                <i class="fas fa-search fa-2x" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="search"
                       style="width: 70%; border: 0.1px solid #5a6268; border-radius: 4px;box-shadow: 1px 1px 8px gray; padding: 19px 20px;"
                       placeholder="Search for the language you want to learn: PHP, Python, Javascript,.....">
            </form>
        </div>
    </div>
    <div class="container-fluid col-md-10 col-md-offset-1">
        <div class="row" id="courses">

        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    //hovers
    $(".navbar-light .navbar-nav .nav-link").hover(function () {
        $(this).css('color', 'gray');
    }, function () {
        $(this).css('color', 'black');
    });
    $('.tutorial').hover(function () {
        $(this).css('background-color', '#b1d6ff');
        $(this).css('border-radius', '25px');
    }, function () {
        $(this).css('background-color', 'white');
    });

    $('.sign').hover(function () {
        $(this).css('background-color', '#b1d6ff');
        $(this).css('border-radius', '10px');

    }, function () {
        $(this).css('background-color', 'white');
    });

    //ajax
    function getCourses() {
        $.get('api/data-science', function (data) {
                console.log(data);
                $('#courses').html('');
                $.each(data.data, function (index, value) {
                    $('#courses').append(
                        "<div class='col-md-4' style='display: flex;'>" +
                        " <a class='col-md-12 courses-style' href='#'>" + value.name + "</a>" +
                        "</div>");
                });
            }
        );

    }


    $(document).ready(function () {
        getCourses();
    })
</script>
