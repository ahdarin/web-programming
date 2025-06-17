@extends('layouts.app')

@section('content')
    <h2>Detail Mahasiswa</h2>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <p id="nim">{{ $student->nim }}</p>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <p id="name">{{ $student->name }}</p>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat:</label>
                <p id="address">{{ $student->address }}</p>
            </div>

            <div class="mb-3">
                <label for="major" class="form-label">Jurusan:</label>
                <p id="major">{{ $student->major->name }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Kuliah Diambil:</label>
                @if ($student->subjects->count() > 0)
                    <ul>
                        @foreach ($student->subjects as $subject)
                            <li>{{ $subject->name }} ({{ $subject->sks }} SKS)</li>
                        @endforeach
                    </ul>
                    <p><strong>Total SKS:</strong> {{ $student->subjects->sum('sks') }}</p>
                @else
                    <p>Tidak ada mata kuliah yang diambil.</p>
                @endif
            </div>

            <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
    </div>
@endsection