@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="header">

                <a href="{{route('programming')}}">{{$technologies->categories->name}}</a>    >   <b>{{$technologies->name}} Tutorials</b>

            </div>

        </div>
        <div class="row">
            <div class="tutorial-title mt-5 d-flex flex-row col-md-12">
                <div class="col-md-1">

                <img src="{{$technologies->img}}" alt="img" class="img-fluid mr-5" width="50px">

                </div>
                   <div class="col-md-11">

                    <h1>{{$technologies->name}} Tutorials and Courses</h1>
                <h5 class="mb-5">Learn {{$technologies->name}} online from the best {{$technologies->name}} tutorials & voted by the programming
                    <br> community.</h5>

            </div>
        </div>
    </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 border border-primary rounded bg-white" style="font-size: large">
                <h5 class="border-bottom border-info p-3 font-weight-bolder">Filter Courses</h5>
                <p class="font-weight-bolder mb-1">Type of course</p>
               <div class="mb-2">
                <input type="checkbox" name="type" id=""> Free <br>
                <input type="checkbox" name="type" id=""> Paid
               </div>
                <p class="font-weight-bolder mb-1">Medium</p>
                <div class="mb-2">
                    <input type="checkbox" name="medium" id=""> Book <br>
                    <input type="checkbox" name="medium" id=""> Video
                </div>
                <p class="font-weight-bolder mb-1">Level</p>
              <div class="mb-2">
                  <input type="checkbox" name="medium" id="" style="border:1px solid red;"> Beginner <br>
                  <input type="checkbox" name="medium" id=""> Advanced
              </div>
                <p class="font-weight-bolder mb-1">Version</p>
                @foreach($technologies->subcategories as $name)
                    <div class="mb-2">
                        <input type="checkbox" name="course"> {{$name->name}} <br>
                    </div>
                    @endforeach
                <p class="font-weight-bolder mb-1">Language</p>
                @foreach($language as $lang)
                    <div class="mb-2"><input type="checkbox" name="lang"> {{$lang->name}} <br>
                    </div>
                @endforeach
            </div>
            <div class="col-md-8 ml-4 p-0 border border-secondary rounded">
                <div class="d-flex justify-content-between border-bottom align-items-center border-secondary p-2 bg-white font-weight-bolder">
                    <div>Top {{$technologies->name}} tutorials</div>
                    <div>
                    <a href="#" class="clicked">Upvotes <i class="fas fa-arrow-down"></i></a> |
                    <a href="#">Recent</a>
                    </div>
                </div>
                    @foreach($technologies->courses as $tutorial)
                <div class="col-md-12 d-flex border-bottom selected bg-white">
                    <div class="col-md-1 p-3">
                        <button type="button" class="btn btn-dark btn-lg"><i class="fas fa-caret-up fa-2x"></i>288</button>
                    </div>
                    <div class="col-md-11 p-3 ml-3">
                        <a href="{{$tutorial->url}}" class="h5 font-weight-bolder text-decoration-none text-dark">{{$tutorial->name}}<span class="small"> ({{$tutorial->url}})</span></a>
                        <p>Submitted by {{$tutorial->users->name}}</p>
                    <div class="tags">
                       <button class="bg-dark"><a href=""class="font-weight-bolder"><?=ucwords($tutorial->type)?></a></button>
                        <button class="bg-dark"><a href="" class="font-weight-bolder"><?=ucwords($tutorial->medium)?></a></button>
                       <button class="bg-dark"><a href="" class="font-weight-bolder"><?=ucwords($tutorial->level)?></a></button>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
