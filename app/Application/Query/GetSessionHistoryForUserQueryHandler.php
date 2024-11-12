<?php

namespace App\Application\Query;

use App\Application\ViewFactory\History\HistoryViewFactory;
use App\Domain\Repositories\SessionRepositoryInterface;

class GetSessionHistoryForUserQueryHandler
{
    public function __construct(
        private readonly SessionRepositoryInterface $sessionRepository
    ) {
    }

    public function __invoke(GetSessionHistoryForUserQuery $query): array
    {
        $history = $this->sessionRepository->getHistoryForUser(
            userId: $query->getUserId(),
            limit: $query->getLimit(),
        );

        $history = HistoryViewFactory::createCollection(
            $history->toArray()
        );

        return [
            'history' => $history
        ];
    }
}
