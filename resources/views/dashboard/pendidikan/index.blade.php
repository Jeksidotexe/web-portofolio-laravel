@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Pendidikan</p>
    <div class="pb-3"><a href="{{ route('pendidikan.create') }}" class="btn btn-primary">+ Tambah Pendidikan</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Nama Sekolah/Kampus</th>
                    <th>Jurusan</th>
                    <th>Kompetensi Keahlian/Program Studi</th>
                    <th>Nilai Akhir/IPK</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>{{ $item->info3 }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        <td>
                            <a href='{{ route('pendidikan.edit' ,$item->id) }}'
                                class="btn btn-sm btn-warning">Ubah</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini!')" 
                                    action="{{ route('pendidikan.destroy', $item->id) }}"
                                    class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"
                                        name="submit">Hapus</button>
                                </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
