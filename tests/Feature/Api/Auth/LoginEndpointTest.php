<?php

namespace Auth;

use App\Infrastructure\Exception\InvalidCredentialsException;
use Tests\TestCase;

class LoginEndpointTest extends TestCase
{
    public function testValidationFails(): void
    {
        $response = $this->post(
            uri: '/api/login',
            data: [
                'email' => '',
                'password' => '',
            ]
        );

        $response->assertStatus(422);
    }

    public function testIncorrectCredentials(): void
    {
        $response = $this->post(
            uri: '/api/login',
            data: [
                'email' => 'none_existent_email@test.com',
                'password' => 'sometestpassword',
            ]
        );

        $response->assertStatus(401);
        $response->assertJson([
            'error' => (new InvalidCredentialsException())->getMessage()
        ]);
    }
}
