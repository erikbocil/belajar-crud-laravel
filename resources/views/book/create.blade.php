@extends('../templates/template')

@section('content')

<div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="col-6">
        <form action="{{ route('book.store') }}" method="POST">
            @csrf 
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter Title" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Enter Author" value="{{old('author')}}">
                @error('author')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <div class="input-group-text">Rp</div>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{old('price')}}"/>
                </div>
                @error('price')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" style="resize: none">{{old('description')}}</textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="row justify-content-between">
                <button type="reset" class="btn btn-danger col-5">Reset</button>
                <button type="submit" class="btn btn-primary col-5">Submit</button> 
            </div>
        </form>
    </div>
</div>

@endsection