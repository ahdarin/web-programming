@extends('layouts.main') 
@section("judul") Users @endsection 
@section('konten') 
@if(session('status')) 
    <div class="alert alert-success"> 
        {{session('status')}} 
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Username</b></th>
                        <th><b>Email</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <form onsubmit="return confirm('Hapus data user?')" class="d-inline" action="{{route('users.destroy', [$user->id])}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                            </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>

            </table>
            
        </div>
        <p> 
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
        </p>
    </div>
</div> 
@endsection