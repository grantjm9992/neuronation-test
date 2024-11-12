<?php

namespace App\Application\Command\Session;

use App\Domain\Repositories\CourseRepositoryInterface;
use App\Domain\Repositories\SessionRepositoryInterface;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Exception\NotFound\CourseNotFoundException;
use App\Infrastructure\Exception\NotFound\UserNotFoundException;

readonly class CreateSessionCommandHandler
{
    public function __construct(
        private SessionRepositoryInterface $sessionRepository,
        private UserRepositoryInterface $userRepository,
        private CourseRepositoryInterface $courseRepository,
    ) {
    }

    public function __invoke(CreateSessionCommand $command): void
    {
        $user = $this->userRepository->findById(
            $command->getUserId()
        );

        if (null === $user) {
            throw new UserNotFoundException();
        }

        $course = $this->courseRepository->findById(
            $command->getCourseId()
        );

        if (null === $course) {
            throw new CourseNotFoundException();
        }

        $this->sessionRepository->save([
            'user_id' => $command->getUserId(),
            'course_id' => $command->getCourseId(),
        ]);
    }
}
