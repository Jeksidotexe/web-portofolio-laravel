@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('keterampilan.update') }}" method="POST">
        @csrf
      <div class="mb-3">
        <label for="judul" class="form-label">BAHASA PEMROGRAMAN & ALAT</label>
        <input
            type="text"
            class="form-control form-control-sm skill"
            name="_bahasa"
            id="judul"
            aria-describedby="helpId"
            placeholder="Bahasa Pemrograman dan Alat" value="{{ get_meta_value('_bahasa') }}"
        />
      </div>
      <div class="mb-3">
        <label for="judul" class="form-label">ALUR KERJA</label>
        <textarea class="form-control summernote" name="_alurkerja" rows="5">{{ get_meta_value('_alurkerja') }}</textarea>
      </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

@push('child-scripts')
    <script>
      $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
              source: [{!! $skill !!}],
              delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
    </script>
@endpush