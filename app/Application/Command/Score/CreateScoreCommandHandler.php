<?php

namespace App\Application\Command\Score;

use App\Domain\Repositories\ExerciseRepositoryInterface;
use App\Domain\Repositories\SessionRepositoryInterface;
use App\Infrastructure\Exception\NotFound\ExerciseNotFoundException;
use App\Infrastructure\Exception\NotFound\SessionNotFoundException;
use App\Infrastructure\Exception\NotFound\UserNotFoundException;
use App\Infrastructure\Repositories\ScoreRepository;
use App\Infrastructure\Repositories\UserRepository;

class CreateScoreCommandHandler
{
    public function __construct(
        private ScoreRepository $scoreRepository,
        private UserRepository $userRepository,
        private ExerciseRepositoryInterface $exerciseRepository,
        private SessionRepositoryInterface $sessionRepository,
    ) {
    }

    public function __invoke(CreateScoreCommand $command): void
    {
        $user = $this->userRepository->findById(
            $command->getUserId()
        );

        if (null === $user) {
            throw new UserNotFoundException();
        }

        $exercise = $this->exerciseRepository->findById(
            $command->getExerciseId()
        );

        if (null === $exercise) {
            throw new ExerciseNotFoundException();
        }

        $session = $this->sessionRepository->findById(
            $command->getExerciseId()
        );

        if (null === $session) {
            throw new SessionNotFoundException();
        }

        $this->scoreRepository->save([
            'exercise_id' => $command->getExerciseId(),
            'user_id' => $command->getUserId(),
            'session_id' => $command->getSessionId(),
            'score' => $command->getScore(),
            'start_difficulty' => $command->getStartDifficulty(),
            'end_difficulty' => $command->getEndDifficulty(),
        ]);

        // @TODO
        // Here implement an event->listener to update Session.score and Session.normalized_score
        //
        // Send session_id, exercise_id & score
    }
}
