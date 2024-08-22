<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index(Request $request)
    {
        $period = Period::first();
        if ($request->exists('change')) {
            $period->update(['status' => ! $period->status->value]);
            $period->refresh();

            return redirect()->route('periods.index');
        }

        return view('pages.period.index', [
            'period' => $period,
        ]);
    }
}
