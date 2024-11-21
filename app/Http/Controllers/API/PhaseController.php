<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Phase;
use Illuminate\Pagination\LengthAwarePaginator;

class PhaseController extends Controller
{
    public function index()
    {
        $phases = Phase::all();
        return response()->json($phases);
    }
}
