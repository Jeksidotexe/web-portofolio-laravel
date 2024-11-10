@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('projects.index') }}" class="btn btn-secondary">
        << Kembali</a>
    </div>
    <form action="{{ route('projects.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
      <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input
            type="text"
            class="form-control form-control-sm"
            name="judul"
            id="judul"
            aria-describedby="helpId"
            placeholder="Judul" value="{{ $data->judul }}"
        />
      </div>
      <div class="mb-3">
        <label for="judul" class="form-label">Isi</label>
        <textarea class="form-control summernote" name="isi" rows="5">{{ $data->isi }}</textarea>
      </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN PERUBAHAN</button>
    </form>
@endsection