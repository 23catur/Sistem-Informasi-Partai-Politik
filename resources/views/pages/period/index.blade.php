@extends('layouts.app')
@section('title', 'Status Period')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Status Period</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h3><span class="badge bg-{{ $period->status->value == \App\Enums\PeriodStatus::Close ? 'danger' : 'success' }}">{{ $period->status->description }}</span></h3></td>
                            <td>
                                <form action="">
                                    <input type="hidden" name="change">
                                    <button class="btn btn-{{ $period->status->value == \App\Enums\PeriodStatus::Close ? 'success' : 'danger' }}">
                                        {{ $period->status->value == \App\Enums\PeriodStatus::Close ? 'Open' : 'Close' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
