<?php

namespace App\Application\Services\Auth\Register;

use App\Application\Services\Auth\Login\LoginWithUserServiceInterface;
use App\Application\Services\Auth\Password\PasswordHashInterface;
use App\Application\ViewFactory\Auth\Registration\UserRegisteredViewFactory;
use App\Domain\Enum\UserRole;
use App\Domain\Enum\UserStatus;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\View\Auth\UserRegisteredView;
use App\Infrastructure\Exception\Validation\UserAlreadyExistsException;

class RegisterUserService implements RegisterUserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly PasswordHashInterface $passwordHash,
        private readonly LoginWithUserServiceInterface $loginWithUserService
    ) {
    }

    public function __invoke(string $email, string $password): UserRegisteredView
    {
        $user = $this->userRepository->findByEmail(
            $email
        );

        if ($user !== null) {
            throw new UserAlreadyExistsException();
        }

        $hashedPassword = $this->passwordHash->__invoke($password);

        $user = $this->userRepository->create([
            'email' => $email,
            'password' => $hashedPassword,
            'user_role' => UserRole::USER->value,
            'status' => UserStatus::ACTIVE->value,
        ]);

        $token = $this->loginWithUserService->__invoke($user);

        return UserRegisteredViewFactory::create($user, $token);
    }
}