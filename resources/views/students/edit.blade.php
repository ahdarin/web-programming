@extends('layouts.app')

@section('content')
<h2>Edit Mahasiswa</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Use PUT method for updates --}}

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                {{-- Populate with existing student data, or old input on validation error --}}
                <input type="text" class="form-control @error('nim') is-invalid @enderror"
                       id="nim" name="nim" value="{{ old('nim', $student->nim) }}">
                @error('nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name', $student->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror"
                       id="address" name="address" value="{{ old('address', $student->address) }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="major_id" class="form-label">Jurusan</label>
                <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror" >
                    <option value="">Pilih Jurusan</option>
                    @foreach ($majors as $major)
                        {{-- Pre-select the current major --}}
                        <option value="{{ $major->id }}" {{ old('major_id', $student->major_id) == $major->id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                    @endforeach
                </select>
                @error('major_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                 @error('subjects')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                @foreach ($subjects as $subject)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="subjects[]"
                               value="{{ $subject->id }}" id="subject{{ $subject->id }}"
                               {{-- Check if the subject is currently associated with the student --}}
                               {{ in_array($subject->id, old('subjects', $student->subjects->pluck('id')->toArray())) ? 'checked' : '' }}>

                        <label for="subject{{ $subject->id }}" class="form-check-label">
                            {{ $subject->name }} ({{ $subject->sks }} SKS)
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection