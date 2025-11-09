<?php

namespace Tests\Feature\Admin\Club;

use App\Constants\UserRole;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Club\CreateClubRequest;
use Tests\Feature\TestCase;

class CreateClubTest extends TestCase
{
    use RefreshDatabase;

    private const NAME_MAX_LENGTH            = 50;
    private const NAME_EXCEEDS_MAX_LENGTH    = 51;
    private const ADDRESS_MAX_LENGTH         = 150;
    private const ADDRESS_EXCEEDS_MAX_LENGTH = 151;

    private Club $club;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);

        $this->club = Club::factory()->make();
    }

    /**
     * Happy path: cannot create club if is unauthorized
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_if_is_unauthorized(): void
    {
        $request = CreateClubRequest::make($this->club);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can create club successfully with valid data
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_create_club_with_valid_data(): void
    {
        $request = CreateClubRequest::make($this->club);

        $response = $this->send($request);

        $response->assertRedirect();

        $this->assertDatabaseHas('clubs', [
            'name' => $this->club->name,
            'address' => $this->club->address,
        ]);
    }

    /**
     * Cannot create club without name (required validation)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_without_name(): void
    {
        $request = CreateClubRequest::make(null)->with(['address' => $this->club->address]);

        $response = $this->send($request);

        $response->assertInvalid([
            'name' => __('validation.required', ['attribute' => 'name']),
        ]);
    }

    /**
     * Cannot create club without address (required validation)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_without_address(): void
    {
        $request = CreateClubRequest::make(null)->with(['name' => $this->club->name]);

        $response = $this->send($request);

        $response->assertInvalid([
            'address' => __('validation.required', ['attribute' => 'address']),
        ]);
    }

    /**
     * Cannot create club with name exceeding max length (max:150)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_with_name_exceeding_max_length(): void
    {
        $request = CreateClubRequest::make($this->club)->with(['name' => Str::random(self::NAME_EXCEEDS_MAX_LENGTH)]);

        $response = $this->send($request);

        $response->assertInvalid([
            'name' => __('validation.max.string', ['attribute' => 'name', 'max' => self::NAME_MAX_LENGTH]),
        ]);
    }

    /**
     * Cannot create club with address exceeding max length (max:150)
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_with_address_exceeding_max_length(): void
    {
        $request = CreateClubRequest::make($this->club)->with(['address' => Str::random(self::ADDRESS_EXCEEDS_MAX_LENGTH)]);

        $response = $this->send($request);

        $response->assertInvalid([
            'address' => __('validation.max.string', ['attribute' => 'address', 'max' => self::ADDRESS_MAX_LENGTH]),
        ]);
    }

    /**
     * Cannot create club if name is not a string
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_with_name_not_string(): void
    {
        $request = CreateClubRequest::make($this->club)->with(['name' => 12345]);

        $response = $this->send($request);

        $response->assertInvalid([
            'name' => __('validation.string', ['attribute' => 'name']),
        ]);
    }

    /**
     * Cannot create club if address is not a string
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_create_club_with_address_not_string(): void
    {
        $request = CreateClubRequest::make($this->club)->with(['address' => 12345]);

        $response = $this->send($request);

        $response->assertInvalid([
            'address' => __('validation.string', ['attribute' => 'address']),
        ]);
    }

    /**
     * Send a request with the authenticated admin user.
     *
     * @param  CreateClubRequest  $request
     * @return \Illuminate\Testing\TestResponse
     */
    private function send(CreateClubRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
