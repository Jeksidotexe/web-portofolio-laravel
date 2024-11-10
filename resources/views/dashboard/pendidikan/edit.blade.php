@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">
        << Kembali</a>
    </div>
    <form action="{{ route('pendidikan.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
      <div class="mb-3">
        <label for="judul" class="form-label">Sekolah/Kampus</label>
        <input
            type="text"
            class="form-control form-control-sm"
            name="judul"
            id="judul"
            aria-describedby="helpId"
            placeholder="Nama Sekolah atau Kampus" value="{{ $data->judul }}"
        >
      </div>
      <div class="mb-3">
        <label for="info1" class="form-label">Jurusan</label>
        <input
            type="text"
            class="form-control form-control-sm"
            name="info1"
            id="info1"
            aria-describedby="helpId"
            placeholder="Nama Jurusan" value="{{ $data->info1 }}"
        >
      </div>
      <div class="mb-3">
        <label for="info2" class="form-label">Kompetensi Keahlian/Program Studi</label>
        <input
            type="text"
            class="form-control form-control-sm"
            name="info2"
            id="info2"
            aria-describedby="helpId"
            placeholder="Nama Kompetensi Keahlian atau Program Studi" value="{{ $data->info2 }}"
        >
      </div>
      <div class="mb-3">
        <label for="info3" class="form-label">Nilai Akhir/IPK</label>
        <input
            type="text"
            class="form-control form-control-sm"
            name="info3"
            id="info3"
            aria-describedby="helpId"
            placeholder="Nilai Akhir atau IPK" value="{{ $data->info3 }}"
        >
      </div>
      <div class="mb-3">
        <div class="row">
          <div class="col-auto">Tanggal Mulai</div>
          <div class="col-auto"><input type="date" class="form-control
            form-control-sm" name="tgl_mulai"
            placeholder="dd/mm/yyyy" value="{{ $data->tgl_mulai }}"></div>
          <div class="col-auto">Tanggal Akhir</div>
          <div class="col-auto"><input type="date" class="form-control
            form-control-sm" name="tgl_akhir"
            placeholder="dd/mm/yyyy" value="{{ $data->tgl_akhir }}"></div>
        </div>
      </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN PERUBAHAN</button>
    </form>
@endsection