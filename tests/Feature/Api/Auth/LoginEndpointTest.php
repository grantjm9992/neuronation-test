<?php

namespace Tests\Feature\Api\Auth;

use App\Infrastructure\Exception\Auth\InvalidCredentialsException;
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

    public function testRegister(): void
    {
        $email = 'none_' . random_int(1, 10000) . 'existent_' . random_int(1, 10000) . '_email@test.com';
        $response = $this->post(
            uri: '/api/register',
            data: [
                'email' => $email,
                'password' => 'sometestpassword',
            ]
        );

        $response->assertStatus(200);
        $response = $this->post(
            uri: '/api/register',
            data: [
                'email' => $email,
                'password' => 'sometestpassword',
            ]
        );

        $response->assertStatus(422);
    }
}
