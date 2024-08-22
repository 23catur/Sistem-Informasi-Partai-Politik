@extends('layouts.app')
@section('title', 'Penilaian ' . $alternative->name)
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Penilaian {{ $alternative->name }}</h5>
        </div>
        <div class="card-body">
            @if ($criterias->count() >= 3)
                <form action="{{ route('alternatives.assesments.sync', $alternative->id) }}" method="POST">
                    @csrf
                    @if (auth()->user()->level->value == App\Enums\UserLevel::Admin)
                    @foreach ($criterias as $criteria)
                        <div class="form-group mb-3">
                            <label class="form-label">{{ $criteria->code . ' - ' . $criteria->name }}</label>
                            <select name="criterias[{{ $criteria->id }}]" class="form-control" disabled>
                                @foreach ($criteria->subs as $sub)
                                    <option value="{{ $sub->id }}" {{ isset($data[$criteria->id]) && $data[$criteria->id] == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach

                    
                        <div class="form-group mb-3">
                            <label class="required-label">Validasi</label>
                            <select name="status" class="form-control" disabled>
                                <option value="Belum Validasi" {{ $alternative->criteria()->where('status', 'Belum Validasi')->exists() ? 'selected' : '' }}>Belum Validasi</option>
                                <option value="Validasi" {{ $alternative->criteria()->where('status', 'Validasi')->exists() ? 'selected' : '' }}>Validasi</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    @endif

                    @if (auth()->user()->level->value == App\Enums\UserLevel::Superuser)
                    @foreach ($criterias as $criteria)
                        <div class="form-group mb-3">
                            <label class="form-label">{{ $criteria->code . ' - ' . $criteria->name }}</label>
                            <select name="criterias[{{ $criteria->id }}]" class="form-control">
                                @foreach ($criteria->subs as $sub)
                                    <option value="{{ $sub->id }}" {{ isset($data[$criteria->id]) && $data[$criteria->id] == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                        <div class="form-group mb-3">
                            <label class="required-label">Validasi</label>
                            <select name="status" class="form-control">
                                <option value="Belum Validasi" {{ $alternative->criteria()->where('status', 'Belum Validasi')->exists() ? 'selected' : '' }}>Belum Validasi</option>
                                <option value="Validasi" {{ $alternative->criteria()->where('status', 'Validasi')->exists() ? 'selected' : '' }}>Validasi</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Validasi</button>
                    @endif

                    <a href="{{ route('alternatives.assesments.index') }}" class="btn btn-warning">Batal</a>
                </form>
            @else
                <h3>Tambahkan minimal 3 kriteria</h3>
            @endif
        </div>
    </div>
@endsection
