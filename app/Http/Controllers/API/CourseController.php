<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Phase;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    /**
     * @param  ?string  $phase
     * @return LengthAwarePaginator<Course>
     */
    public function index($phase = null): LengthAwarePaginator
    {
        if ($phase) {
            return Phase::where('slug', $phase)->firstOrFail()->courses()->where('is_published', 1)->paginate(15);
        }

        return Course::where('is_published', 1)->paginate(15);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'category' => 'nullable|string|max:255',
            'is_purchasable' => 'required|boolean',
            'is_published' => 'required|boolean',
            'image' => 'nullable|string',  // Assuming the image URL or path is provided as a string
            'rating' => 'nullable|numeric|min:0|max:5',
            'available_from' => 'nullable|date',
            'available_to' => 'nullable|date|after_or_equal:available_from',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'message' => 'Course created successfully!',
            'course' => $course,
        ], 201);
    }

}
