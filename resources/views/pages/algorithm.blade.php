@extends('layouts.app')
@section('title', 'Alternatif')
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
                    <div class="card-header">Penilaian Alternatif</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
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
                                            <td>{{ $assesment['code'] . ' - ' . $assesment['name'] }}</td>
                                            @foreach ($assesment['sub_criteria'] as $value)
                                                <td>{{ $value['name'] }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Penilaian Alternatif</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
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
                                            <td>{{ $assesment['code'] . ' - ' . $assesment['name'] }}</td>
                                            @foreach ($assesment['criteria'] as $value)
                                                <td>{{ $value }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bobot Dan Pangkat</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        @foreach ($criterias as $criteria)
                                            <th>{{ $criteria->code . ' - ' . $criteria->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>Bobot</td>
                                        @foreach ($weight as $criteriaId => $val)
                                            <td>{{ $val / array_sum($weight) }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Pangkat</td>
                                        @foreach ($criterias as $criteria)
                                            <td>
                                                @if ($criteria->attribute->value == \App\Enums\CriteriaAttribute::Cost)
                                                    -{{ $criteria->weight / array_sum($weight) }}
                                                @else
                                                    {{ $criteria->weight / array_sum($weight) }}
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nilai Vektor S</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Vektor S / Kriteria</th>
                                        @foreach ($criterias as $criteria)
                                            <th>{{ $criteria->code . ' - ' . $criteria->name }}</th>
                                        @endforeach
                                        <th>Nilai Vektor S</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($assesments as $key => $assesment)
                                        <tr>
                                            <td>S {{ $assesment['code'] }} - {{ $assesment['name'] }}</td>
                                            @foreach ($assesment['criteria'] as $criteriaId => $item)
                                                <td>{{ $assesment['res_vector_s'][$criteriaId] }}</td>
                                            @endforeach
                                            <td>{{ round($assesment['vector_s'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nilai Vektor V</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nilai Vektor V</th>
                                        <th>Rank</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($assesments as $key => $assesment)
                                        <tr>
                                            <td> {{ $assesment['code'] . ' - ' . $assesment['name'] }}</td>
                                            <td>{{ $assesment['res_vector_v'] }}</td>
                                            <td>{{ $loop->index + 1 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
