<?php

namespace App\Application\Query;

use App\Application\ViewFactory\History\LastSessionViewFactory;
use App\Domain\Repositories\DomainCategoryRepositoryInterface;
use App\Domain\Repositories\SessionRepositoryInterface;
use App\Domain\View\LastSessionDetailView;
use App\Infrastructure\Exception\NoSessionForUserException;

class GetCategoriesFromLastSessionQueryHandler
{
    public function __construct(
        private readonly SessionRepositoryInterface $sessionRepository,
        private readonly DomainCategoryRepositoryInterface $domainCategoryRepository,
    ) {
    }

    public function __invoke(GetCategoriesFromLastSessionQuery $query): LastSessionDetailView
    {
        $lastUserSession = $this->sessionRepository->findLastSessionForUser(
            $query->getUserId()
        );

        if (null === $lastUserSession) {
            throw new NoSessionForUserException();
        }
        $data = $this->domainCategoryRepository->getDomainCategoriesForSession(
            $lastUserSession->id
        );

        return LastSessionViewFactory::create($data);
    }
}