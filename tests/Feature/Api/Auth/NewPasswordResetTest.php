<?php

namespace Tests\Feature\Api\Auth;

use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\TestCase;

class NewPasswordResetTest extends TestCase
{
    /**
     * A user can requested a link for reset your password.
     *
     * @return void
     */
    #[Test]
    public function can_reset_new_password(): void
    {
        $this->markTestSkipped("TODO implement test with token request refactor template email");
    }
}
