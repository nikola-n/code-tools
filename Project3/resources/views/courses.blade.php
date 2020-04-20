@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="header">
                <a href="{{route('programming')}}">{{$technologies->categories->category_name}}</a> >
                <b>{{$technologies->technology_name}} Tutorials</b>

            </div>
        </div>
        <div class="row">
            <div class="tutorial-title mt-5 d-flex flex-row col-md-12">
                <div class="col-md-1">

                    <img src="{{$technologies->img}}" alt="img" class="img-fluid mr-5" width="50px">

                </div>
                <div class="col-md-11">

                    <h1>{{$technologies->technology_name}} Tutorials and Courses</h1>
                    <h5 class="mb-5">Learn {{$technologies->technology_name}} online from the
                        best {{$technologies->technology_name}} tutorials & voted by the programming
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
                    @foreach($type as $t)
                        @if($loop->first)
                            <form method="get" action="#">
                                <input type="checkbox" name="type" id="free" value="free"> Free ({{$t}})
                            </form>
                        @endif
                        @if($loop->last)
                            <input type="checkbox" name="type" id="paid" value="paid"> Paid ({{$t}})
                        @endif
                    @endforeach
                </div>
                <p class="font-weight-bolder mb-1">Medium</p>
                <div class="mb-2">
                    @foreach($medium as $m)
                        @if($loop->first)
                            <input type="checkbox" name="medium" id=""> Book ({{$m}}) <br>
                        @endif
                        @if($loop->last)
                            <input type="checkbox" name="medium" id=""> Video ({{$m}})
                        @endif
                    @endforeach
                </div>
                <p class="font-weight-bolder mb-1">Level</p>
                <div class="mb-2">
                    @foreach($level as $l)
                        @if($loop->first)
                            <input type="checkbox" name="level" id=""> Beginner ({{$l}})
                            <br>
                        @endif
                        @if($loop->last)
                            <input type="checkbox" name="level" id=""> Advanced ({{$l}})
                        @endif
                    @endforeach
                </div>
                <p class="font-wight-bolder mb-1">Version</p>
                @foreach($subcategory as $key=>$value)
                    <div class="mb-2">
                        <input type="checkbox" name="course"> {{$key}} ({{$value}})
                    </div>
                @endforeach
                <p class="font-weight-bolder mb-1">Language</p>
                @foreach($language as $lang => $lang_number)
                    <div class="mb-2"><input type="checkbox" name="lang"> {{$lang}} ({{$lang_number}})</div>
                @endforeach
            </div>
            <div class="col-md-8 ml-4 p-0 border rounded border-primary font-weight-bolder">
                <div
                    class="d-flex justify-content-between border-bottom align-items-center border-secondary p-2 bg-white font-weight-bolder">
                    <div>Top {{$technologies->name}} tutorials</div>
                    <div>
                        <a href="#" class="clicked">Upvotes <i class="fas fa-arrow-down"></i></a> |
                        <a href="{{URL::to('/recent')}}">Recent</a>
                    </div>
                </div>
                <div id="c">
                    @foreach($technologies->courses as $tutorial)
                        <div class="col-md-12 d-flex border-bottom selected bg-white">
                            <div class="col-md-1 p-3">
                                <form action="{{URL::to('votes')}}/{{$tutorial->id}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-dark btn-lg" id="vote">
                                        <i class="fas fa-caret-up fa-2x"></i>
                                        {{$tutorial->votes->count() ?: 0 }}
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-11 p-3 ml-3">
                                <a href="{{$tutorial->url}}"
                                   class="h5 font-weight-bolder text-decoration-none text-dark">{{$tutorial->name}}<span
                                        class="small"> ({{$tutorial->url}})</span></a>
                                <p>Submitted by {{$tutorial->users->name}}</p>
                                <div class="tags">
                                    <button class="bg-dark"><a href="#"
                                                               class="font-weight-bolder"><?=ucwords($tutorial->type)?></a>
                                    </button>
                                    <button class="bg-dark"><a href="#"
                                                               class="font-weight-bolder"><?=ucwords($tutorial->medium)?></a>
                                    </button>
                                    <button class="bg-dark"><a href="#"
                                                               class="font-weight-bolder"><?=ucwords($tutorial->level)?></a>
                                    </button>
                                    @foreach($tutorial->subcategories as $sub)
                                        <button class="bg-dark"><a href="#"
                                                                   class="font-weight-bolder"><?=ucwords($sub->subcategory_name)?></a>
                                        </button>
                                    @endforeach
                                    @foreach($tutorial->languages as $lan)
                                        <button class="bg-dark"><a href="#"
                                                                   class="font-weight-bolder"><?=ucwords($lan->language_name)?></a>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $.get('http://project3.test/recent', function (data) {
        var courses = data;
        console.log(courses);

    });

    $(document).ready(function () {
        $('#free').on('change', function (e) {
            e.preventDefault();
            $.get('http://project3.test/filtered?type=free', function (data) {
                $('#c').html('');
                $.each(data, function (index, value) {
                    console.log(value);
                    $('#c').append('<div class="col-md-12 d-flex border-bottom selected bg-white">' +
                        '<div class="col-md-1 p-3">' +
                        '<button type="submit" class="btn btn-dark btn-lg" id="vote" data-course-id="">' +
                        '<i class="fas fa-caret-up fa-2x">' +
                        '</i>' +
                        '<span>' + value.votes + '</span>' +
                        '</button>' +
                        '</div>' +
                        '<div class="col-md-11 p-3 ml-3">' +
                        '<a href="' + value.url + '"class="h5 font-weight-bolder text-decoration-none text-dark">' + value.name +
                        '<span class="small">' + value.url + '</span>' +
                        '</a>' +
                        '<p>Submitted by ' + $($.each(value, function (user, name) {
                            console.log(name)
                        })) + '</p>' +
                        '</div>'
                    );

                });
            })
        })
    })
</script>
{{--Vue failed tries--}}
{{--            import axios from "axios";--}}
{{--            export default {--}}
{{--                data() {--}}
{{--                    return {--}}
{{--                        filtered: []--}}
{{--                    };--}}
{{--                },--}}
{{--                mounted() {--}}
{{--                    axios.get("http://project3.test/filtered?type=free").then(response => console.log(response))--}}
{{--                }--}}
{{--            };--}}
{{--        </script>--}}
{{--        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.js"></script>--}}
{{--        <script>--}}
{{--            // Vue.component('courses', {--}}
{{--            //     template: '#courses-template',--}}
{{--            //     require('./components/ExampleComponent.vue').default--}}
{{--            //     data() {--}}
{{--            //            courses: []--}}
{{--            //     },--}}
{{--            //     created() {--}}
{{--            //             $.getJSON('http://project3.test/filtered?type=free', function (data) {--}}
{{--            //                 console.log(data);--}}
{{--            //                 this.courses = data;--}}
{{--            //             }.bind(this));--}}
{{--            //     },--}}
{{--            // });--}}
{{--            // new Vue({--}}
{{--            //     el: '#root',--}}
{{--            // });--}}
{{--          // var vm = new Vue({--}}
{{--          //       el:'#root',--}}
{{--          //--}}
{{--          //       data: {--}}
{{--          //           filtered: []--}}
{{--          //       },--}}
{{--          //       mounted() {--}}
{{--          //           axios.get('http://project3.test/filtered?type=free').then(response => this.filtered = response.data);--}}
{{--          //       }--}}
{{--          //   })--}}
{{--          //   vm.filtered = 'HOLA';--}}
{{--            // </script>--}}





