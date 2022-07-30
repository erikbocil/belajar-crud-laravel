@extends('../templates/template')

@section('content')

<div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="col-6">
        <form action="/book" method="POST">
            @csrf 
            @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author" value="{{old('author')}}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <div class="input-group-text">Rp</div>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{old('price')}}"/>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" style="resize: none">{{old('title')}}</textarea>
            </div>
            <div class="row justify-content-between">
                <button type="reset" class="btn btn-danger col-5">Reset</button>
                <button type="submit" class="btn btn-primary col-5">Submit</button> 
            </div>
        </form>
    </div>
</div>

@endsection