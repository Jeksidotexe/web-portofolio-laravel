@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Projects</p>
    <div class="pb-3"><a href="{{ route('projects.create') }}" class="btn btn-primary">+ Tambah Projects</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->isi }}</td>
                        <td>
                            <a href='{{ route('projects.edit' ,$item->id) }}'
                                class="btn btn-sm btn-warning">Ubah</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini!')" 
                                    action="{{ route('projects.destroy', $item->id) }}"
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
