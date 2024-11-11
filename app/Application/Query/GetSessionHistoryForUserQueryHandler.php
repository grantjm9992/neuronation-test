<?php

namespace App\Application\Query;

use App\Application\ViewFactory\History\HistoryViewFactory;
use app\Domain\Repositories\SessionRepositoryInterface;

class GetSessionHistoryForUserQueryHandler
{
    public function __construct(
        private SessionRepositoryInterface $sessionRepository
    ) {
    }

    public function __invoke(GetSessionHistoryForUserQuery $query): array
    {
        $history = $this->sessionRepository->getHistoryForUser(
            userId: $query->getUserId(),
            limit: $query->getLimit(),
        );

        return HistoryViewFactory::createCollection(
            $history->toArray()
        );
    }
}
