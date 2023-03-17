<?php

namespace Tests\Unit;

use App\Models\School;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Member;

class MemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new member
     *
     * @return void
     */
    public function testCreateMember()
    {
        $schoolData = $this->generateSchool();
        // Create test data
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'school_id' => $schoolData->id,
        ];

        // Call the Member model's create method
        $member = Member::create($data);

        // Assert that the member was created successfully
        $this->assertDatabaseHas('members', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'school_id' => $schoolData->id,
        ]);
    }

    /**
     * Test that a new member cannot be added with invalid data
     *
     * @return void
     */
    public function testNewMemberCannotBeAddedWithInvalidData()
    {
        // Create invalid member data
        $data = [
            'name' => '',
            'email' => 'invalid email',
            'school_id' => 0,
        ];

        // Validate the data and assert that it fails
        $validator = Validator::make($data, Member::rules());
        $this->assertFalse($validator->passes());
    }

    public function generateSchool() {
        return School::factory()->create([
            'name' => 'Test School',
            'country' => 'United States',
        ]);
    }
}

