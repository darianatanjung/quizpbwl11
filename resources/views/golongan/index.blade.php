@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
       <style>
  body{
    background-color:#00CCFF;
  }
</style>
      <h5>{{ $title }}</h5>
      <a href="{{ route('golongan.create') }}" class="btn btn-success mb-3 float-end">Tambah</a>

      <table class="table table-hover table-striped table-primary">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Kode Golongan</th>
            <th scope="col" class="text-center">Nama Golongan</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach($golongans as $golongan)
          <tr>
            <th class="text-center">{{ $no++ }}</th>
            <td>{{ $golongan->kode }}</td>
            <td>{{ $golongan->nama }}</td>
            <td class="text-center">
              <a class="" href="{{ route('golongan.edit', $golongan->id) }}">
              <img src="img/edit.png" alt="Edit" width="22" height="22">
              </a> </td>
              <td class="text-center">
              <a class="" href="#" data-id="{{ $golongan->id }}" onclick="delete_(`{{ route('golongan.delete', $golongan->id) }}`)">
              <img src="img/delet.png" alt="Delete" width="22" height="22"></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
  function delete_(url) {
    if (confirm('Are you sure?')) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': `{{ csrf_token() }}`
        }
      });

      $.ajax({
        type: "DELETE",
        url: url,
        success: function(result) {
          if (!result) {
            alert('Gagal menghapus data')
          }

          location.reload()
        }
      })
    }
  }
</script>
@endpush