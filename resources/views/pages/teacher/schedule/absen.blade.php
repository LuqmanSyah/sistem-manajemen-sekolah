@extends('layouts.dashboard')

@section('title', 'Absen')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-3">Pelajaran {{ $schedule->lesson->name }}</h3>
            <form action="{{ route('teacher.schedule.absen', $schedule->id) }}" method="POST">
                @csrf
                <input type="hidden" name="class_id" value="{{ $schedule->class->id }}"> 
                <div class="table-responsive">
                    <table class="table-hover table-striped table">
                        <thead class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->class->name }}</td>
                                    <td>
                                        @foreach ($status as $absen)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="absen[{{$student->id}}]"
                                                    id="{{ $absen }}-{{ $student->name }}"
                                                    value="{{ $absen }}">
                                                <label class="form-check-label"
                                                    for="{{ $absen }}-{{ $student->name }}">
                                                    {{ $absen }}
                                                </label>
                                            </div>
                                        @endforeach
                                        {{-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="absen-{{ $student->name }}"
                                                id="absen" value="Izin">
                                            <label class="form-check-label" for="absen">Izin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="absen-{{ $student->name }}"
                                                id="absen" value="Sakit">
                                            <label class="form-check-label" for="absen">Sakit</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="absen-{{ $student->name }}"
                                                id="absen" value="Alpha">
                                            <label class="form-check-label" for="absen">Alpha</label>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success float-end">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
