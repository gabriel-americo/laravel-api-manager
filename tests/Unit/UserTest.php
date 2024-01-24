<?php

namespace Tests\Unit;

use App\Models\Usuario;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $user = new Usuario;

        $expected = [
            'nome',
            'email',
            'password'
        ];

        $arrayCompared = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
