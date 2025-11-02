<?php

namespace Tests\Feature\Admin\Club;

use App\Constants\UserRole;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Club\UpdateClubRequest;
use Tests\Feature\TestCase;

class UpdateClubTest extends TestCase
{
    use RefreshDatabase;

    private const MAX_LENGTH = 150;
    private const EXCEEDS_MAX_LENGTH = 151;

    private Club $club;
    private Club $updatedClub;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);

        $this->club = Club::factory()->create();
        $this->club->refresh(); // Ensure we have the ID from database

        $this->updatedClub = Club::factory()->make();
    }

    /**
     * Happy path: cannot update club if is unauthorized
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_if_is_unauthorized(): void
    {
        $request = UpdateClubRequest::make($this->club, $this->updatedClub);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can update club successfully with valid data
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function can_update_club_with_valid_data(): void
    {
        $request = UpdateClubRequest::make($this->club, $this->updatedClub);

        $response = $this->send($request);

        $response->assertRedirect();

        $this->assertDatabaseHas('clubs', [
            'id' => $this->club->id,
            'name' => $this->updatedClub->name,
            'address' => $this->updatedClub->address,
        ]);
    }

    /**
     * Cannot update club without name (required validation)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_without_name(): void
    {
        $request = UpdateClubRequest::make($this->club, null)->with(['address' => $this->updatedClub->address]);

        $response = $this->send($request);

        $response->assertInvalid([
            'name' => __('validation.required', ['attribute' => 'name']),
        ]);
    }

    /**
     * Cannot update club without address (required validation)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_without_address(): void
    {
        $request = UpdateClubRequest::make($this->club, null)->with(['name' => $this->updatedClub->name]);

        $response = $this->send($request);

        $response->assertInvalid([
            'address' => __('validation.required', ['attribute' => 'address']),
        ]);
    }

    /**
     * Cannot update club with name exceeding max length (max:150)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_with_name_exceeding_max_length(): void
    {
        $request = UpdateClubRequest::make($this->club, $this->updatedClub)
            ->with(['name' => Str::random(self::EXCEEDS_MAX_LENGTH)]);

        $response = $this->send($request);

        $response->assertInvalid([
            'name' => __('validation.max.string', ['attribute' => 'name', 'max' => self::MAX_LENGTH]),
        ]);
    }

    /**
     * Cannot update club with address exceeding max length (max:150)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_with_address_exceeding_max_length(): void
    {
        $request = UpdateClubRequest::make($this->club, $this->updatedClub)
            ->with(['address' => Str::random(self::EXCEEDS_MAX_LENGTH)]);

        $response = $this->send($request);

        $response->assertInvalid([
            'address' => __('validation.max.string', ['attribute' => 'address', 'max' => self::MAX_LENGTH]),
        ]);
    }

    /**
     * Cannot update club if name is not a string
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_with_name_not_string(): void
    {
        $request = UpdateClubRequest::make($this->club, $this->updatedClub)->with(['name' => 12345]);

        $response = $this->send($request);

        $response->assertInvalid([
            'name' => __('validation.string', ['attribute' => 'name']),
        ]);
    }

    /**
     * Cannot update club if address is not a string
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_club')]
    public function cannot_update_club_with_address_not_string(): void
    {
        $request = UpdateClubRequest::make($this->club, $this->updatedClub)->with(['address' => 12345]);

        $response = $this->send($request);

        $response->assertInvalid([
            'address' => __('validation.string', ['attribute' => 'address']),
        ]);
    }

    /**
     * Send a request with the authenticated admin user.
     *
     * @param  UpdateClubRequest  $request
     * @return \Illuminate\Testing\TestResponse
     */
    private function send(UpdateClubRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}

