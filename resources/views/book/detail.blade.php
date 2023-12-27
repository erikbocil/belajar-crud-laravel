@extends('../templates/template')
@section('content')
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                <p class="card-text">{{ $book->description }}</p>
                <a href="{{ route('book.edit', [$book->slug]) }}" class="card-link btn btn-primary">Update</a>
                <form action="{{ route('book.destroy', [$book->slug]) }}" method="post" style="display: inline"
                    id="delete-form">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("delete-form").onsubmit = function(e) {
            e.preventDefault();
            swal({
                    title: "Are you sure want to delete {{ $book->title }} by {{ $book->author }}",
                    text: "Once deleted, you will not be able to recover this record!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // swal("Poof! Your imaginary file has been deleted!", {icon: "success",});
                        this.submit();
                    } else {
                        swal("Canceled");
                    }
                });
        }
    </script>
@endsection
