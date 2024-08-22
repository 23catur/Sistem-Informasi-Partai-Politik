@extends('layouts.app')
@section('title', 'Hasil')
@section('content')
    @if (!empty($err))
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Penilaian Alternatif</div>
                    <div class="card-body">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Peringatan! </strong>
                            <p>Penilaian belum lengkap, berikut nilai yang belum dilengkapi:</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="err">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        <th>Kriteria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($err as $ke => $item)
                                        <tr>
                                            <td>{{ $ke = str_replace('_', ' ', $ke) }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($item as $row)
                                                        <li>{{ $row }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukan Kuota" aria-label="Kuota"
                                    aria-describedby="kuota" name='kuota' value="{{ request()->kuota }}">
                                <button class="btn btn-outline-secondary me-2" type="submit" id="search"><i
                                        data-feather="search"></i></button>
                                <a href="{{ route('result.export', ['kuota' => request()->kuota]) }}" class="btn btn-primary"><i data-feather="upload"></i></a>
                                <!-- <a href="{{ route('result.mail', ['kuota' => request()->kuota]) }}" id="mailBtn" class="btn btn-info"><i
                                    data-feather="send"></i></a> -->
                                <a href="{{ route('algorithm.result') }}" class="btn btn-success"><i
                                        data-feather="refresh-ccw"></i></a>
                                <a href="{{ route('reset-data') }}" class="btn btn-danger" onclick="return confirm('Apa kamu yakin? \nReset Data akan menghapus semua data alternatif dan tidak dapat dipulihkan Kembali.')">Reset Data</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Hasil Rekomendasi</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Rank</th>
                                        @foreach ($criterias as $key => $criteria)
                                            @if ($key == 0)
                                                <th>Alternatif</th>
                                            @endif
                                            <th>{{ $criteria->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($assesments as $key => $assesment)
                                        <tr>
                                            <td>{{ ($assesments->currentPage() - 1) * $assesments->perPage() + $loop->iteration }}</td>
                                            <td>{{ $assesment['code'] . ' - ' . $assesment['name'] }}</td>
                                            @foreach ($assesment['sub_criteria'] as $value)
                                                <td>{{ $value['name'] }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $assesments->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
