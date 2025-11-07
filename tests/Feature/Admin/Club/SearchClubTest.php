<?php

namespace Tests\Feature\Admin\Club;

use App\Constants\UserRole;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Club\SearchClubRequest;
use Tests\Feature\TestCase;

class SearchClubTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);
    }

    /**
     * Cannot search clubs if is unauthorized
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_search_clubs_if_is_unauthorized(): void
    {
        $request = SearchClubRequest::make();

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can search clubs successfully
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_search_clubs_successfully(): void
    {
        $clubs = Club::factory()->count(5)->create();

        $request = SearchClubRequest::make();

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertSame($response->json('recordsFiltered'), 5);
        $this->assertSame($response->json('recordsTotal'), 5);

        $this->assertCount($response->json('recordsFiltered'),  $clubs);
        $this->assertCount($response->json('recordsTotal'),  $clubs);

        $response->assertSee('clubs');
    }

    /**
     * Can search clubs with filters
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_search_clubs_with_filters(): void
    {
        Club::factory()->create([
            'name' => 'Barcelona FC',
        ]);

        Club::factory()->count(5)->create([
            'name' => 'Real Madrid',
        ]);

        $filter['search'] = ['value' => 'Barcelona'];

        $request = SearchClubRequest::make($filter);

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertSame($response->json('recordsFiltered'), 1);
        $this->assertSame($response->json('recordsTotal'), 6);

        $response->assertSee('Barcelona FC');
    }

    /**
     * Can search clubs and returns empty when no matches
     *
     * @return void
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_search_clubs_returns_empty_when_no_matches(): void
    {
        Club::factory()->count(3)->create([
            'name' => 'Real Madrid',
        ]);

        $filter['search'] = ['value' => 'Barcelona'];

        $request = SearchClubRequest::make($filter);

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertSame($response->json('recordsFiltered'), 0);
        $this->assertSame($response->json('recordsTotal'), 3);
    }

    /**
     * Send a request with the authenticated admin user.
     *
     * @param  SearchClubRequest  $request
     * @return \Illuminate\Testing\TestResponse
     */
    private function send(SearchClubRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}

