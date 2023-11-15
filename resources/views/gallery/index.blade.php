@extends('auth.layouts')
@section('content')


<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">

                <div class="mb-3">
                    <form action="{{ route('gallery.create') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success">Add Image</button>
                    </form>
                </div>

                <div class="row">
                    @if(count($galleries)>0)
                    @foreach ($galleries as $gallery)
                    <div class="col-sm-2">
                        <div>
                            <a class="example-image-link" href="{{$gallery->original_pict}}" data-lightbox="roadtrip" data-title="{{$gallery->description}}">
                                <img class="example-image img-fluid mb-2" src="{{asset('storage/posts_image/'.$gallery->picture)}}" alt="{{'storage/posts_image/'.$gallery->picture}}" width="200px" />
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4>{{$gallery->title}}</h4>
                    </div>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</button>                        </form>
                    @endforeach
                    @else
                    <h3>Tidak ada data.</h3>
                    @endif
                    <div class="d-flex">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection