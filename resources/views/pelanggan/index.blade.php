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
      <a href="{{ route('pelanggan.create') }}" class="btn btn-success mb-3 float-end">Tambah</a>

      <table class="table table-hover table-striped table-primary">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col">No pelanggan</th>
            <th scope="col">Golongan</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">No KTP</th>
            <th scope="col">Seri</th>
            <th scope="col">Meteran</th>
            <th scope="col">User</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
            
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach($pelanggans as $pel)
          <tr>
            <th class="text-center">{{ $no++ }}</th>
            <td>{{ $pel->no_pelanggan }}</td>
            <td>{{ $pel->golongan->nama }}</td>
            <td>{{ $pel->nama }}</td>
            <td>{{ $pel->alamat }}</td>
            <td>{{ $pel->no_hp }}</td>
            <td>{{ $pel->ktp }}</td>
            <td>{{ $pel->seri }}</td>
            <td>{{ $pel->meteran }}</td>
            <td>{{ $pel->user->nama }}</td>
            <td>{{ $pel->status }}</td>
            <td class="text-center">
              <a class="" href="{{ route('pelanggan.edit', $pel->id) }}">
              <img src="img/edit.png" alt="Edit" width="20" height="20">
              </a> </td>
              <td class="text-center">
              <a class="" href="#" data-id="{{ $pel->id }}" onclick="delete_(`{{ route('pelanggan.delete', $pel->id) }}`)">
              <img src="img/delet.png" alt="Delete" width="20" height="20"></a>
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
