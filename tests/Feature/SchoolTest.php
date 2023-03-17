<?php

namespace Tests\Unit;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new school
     *
     * @return void
     */
    public function testCreateSchool()
    {
        $school = School::factory()->create([
            'name' => 'Test School',
            'country' => 'United States',
        ]);

        $this->assertInstanceOf(School::class, $school);
        $this->assertEquals('Test School', $school->name);
        $this->assertEquals('United States', $school->country);
    }

}
