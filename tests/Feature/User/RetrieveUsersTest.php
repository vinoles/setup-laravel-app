<?php

namespace Tests\Feature\Api\User;

use App\Models\User;
use Tests\Feature\Requests\Api\RetrieveUsersRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Test;

class RetrieveUsersTest extends TestCase
{
    /**
     * A user not logged in cannot retrieve the users
     *
     * @return void
     */
    #[Test]
    public function cannot_retrieve_users_if_not_logged_in(): void
    {
        $request = RetrieveUsersRequest::make();

        $this->signIn(null)
            ->sendRequestApiGetList($request)
            ->assertUnauthorized();
    }

    /**
     * A user logged in can retrieve the users
     *
     * @return void
     */
    #[Test]
    public function can_retrieve_users_if_is_logged_in(): void
    {
        $users = User::factory()->count(3)->create();

        $request = RetrieveUsersRequest::make();

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiGetList($request);

        $response->assertSuccessful();

        $this->assertEquals(count($response->json('data')), count($users) + 1);

        foreach ($users as $user) {

            $this->assertDatabaseHas('users', [
                'id' => $user->id,
            ]);
        }
    }

    /**
     * A user logged in can retrieve the users paged
     *
     * @return void
     */
    #[Test]
    public function can_retrieve_users_if_is_logged_paged(): void
    {
        $users = User::factory()->count(random_int(10, 100))->create();

        $page = random_int(1, 10);

        $size = random_int(5, 10);

        $total = $users->count() + 1 ;

        $pages = ceil($total / $size);

        $queryPage = ['page' => ['number' => $page, 'size' => $size]];

        $request = RetrieveUsersRequest::make($queryPage);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiGetList($request);

        $response->assertSuccessful();

        $links = $response->json('links');

        $pageMetaInformation = $response->json('meta.page');

        $this->assertEquals($page, $pageMetaInformation['currentPage']);
        $this->assertEquals($total, $pageMetaInformation['total']);
        $this->assertEquals($size, $pageMetaInformation['perPage']);
        $this->assertEquals($pages, $pageMetaInformation['lastPage']);

        $this->assertIsArray($links);
    }


    // TODO DEJARLO COMO EJEMPLO PARA FUTUROS TEST Y LUEGO BORRARLO
    /**
     * A user logged in can retrieve the users filtered by firs_name
     *
     * @return void
     */
    #[Test]
    public function can_retrieve_users_if_is_logged_in_filtered_by_first_name(): void
    {
        $firstName = fake()->firstName() . '1';

        $user = User::factory()->withFirstName($firstName)->create();

        $users = User::factory()->count(random_int(10, 100))->create();

        $page = 1;

        $size = random_int(5, 10);

        $filter = ['first_name' => $firstName];

        $listFiltered = $users
            ->push($user)->where('first_name', $firstName);

        $total = $listFiltered->count();

        $pages = ceil($total / $size);

        $queryPage = ['page' => ['number' => $page, 'size' => $size]];

        $request = RetrieveUsersRequest::make($queryPage, $filter);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiGetList($request);

        $response->assertSuccessful();

        $links = $response->json('links');

        $pageMetaInformation = $response->json('meta.page');

        $this->assertEquals($page, $pageMetaInformation['currentPage']);
        $this->assertEquals($total, $pageMetaInformation['total']);
        $this->assertEquals($size, $pageMetaInformation['perPage']);
        $this->assertEquals($pages, $pageMetaInformation['lastPage']);

        $this->assertIsArray($links);
    }
}
