<?php

namespace Tests\Feature\Http\Controllers\API;

use App\Models\Course;
use App\Models\Phase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    protected Collection $primaryCourses;

    protected Collection $secondaryCourses;

    protected function setUp(): void
    {
        parent::setUp();

        $this->primaryCourses = Course::factory()->published()->count(10)->hasAttached(
            Phase::factory()->create(['name' => 'Primary', 'slug' => 'primary'])
        )->create();

        $this->secondaryCourses = Course::factory()->published()->count(10)->hasAttached(
            Phase::factory()->create(['name' => 'Secondary', 'slug' => 'secondary'])
        )->create();
    }

    public function testIndexNoPhaseReturnsStatusOk(): void
    {
        $this->get('/api/courses')->assertOk();
    }

    public function testIndexNoPhaseReturnsCoursesForMultiplePhases(): void
    {
        $courseIds = $this->get('/api/courses')->json('data.*.id');

        $this->assertEquals(
            $this->primaryCourses->merge($this->secondaryCourses)->pluck('id'),
            collect($courseIds)
        );
    }

    public function testIndexWithPhaseReturnsStatusOk(): void
    {
        $this->get('/api/courses/secondary')->assertOk();
    }

    public function testIndexWithPhaseReturnsCoursesForPhaseOnly(): void
    {
        $courseIds = $this->get('/api/courses/secondary')->json('data.*.id');

        $this->assertEquals(
            $this->secondaryCourses->pluck('id'),
            collect($courseIds),
        );
    }

    public function testIndexWithUnknownPhaseReturnsStatusNotFound(): void
    {
        $this->get('/api/courses/potatoes')->assertNotFound();
    }
}
