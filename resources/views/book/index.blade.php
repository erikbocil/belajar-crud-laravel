@extends('../templates/template')

@section('content')
<div class="container mt-5">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr onclick="location.href='{{url('book/'.$book->id)}}';">
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>Rp {{number_format(round($book->price), 0, ',', '.')}}</td>
                <td>{{$book->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if (Session::has('success'))
  <script>swal("{{session('success')}}", {icon: "success",});</script>
@endif
@endsection