<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Hackr.io Admin</title>
</head>
<body>
<table class="table table-striped text-center" style="white-space: nowrap;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Medium</th>
        <th>Level</th>
        <th>URL</th>
        <th>Approved</th>
    </tr>
    </thead>
    @foreach($courses as $course)
        <tbody>
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->type}}</td>
            <td>{{$course->medium}}</td>
            <td>{{$course->level}}</td>
            <td>{{$course->url}}</td>
            <td>{{$course->approved}}</td>
            <td>
                @if($course->approved == 0)
                    <form action="{{URL::to('/admin/approve')}}/{{$course->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
            <td>
            <td>
                <form action="{{URL::to('/admin/delete')}}/{{$course->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Don't Approve</button>
                </form>
            </td>
            @endif
        </tr>
        </tbody>
    @endforeach
</table>
<div style="margin-left: 43%">
    {{$courses->links()}}
</div>

</body>
</html>
