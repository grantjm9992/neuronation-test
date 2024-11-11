<?php

namespace App\Application\Query;

use App\Application\ViewFactory\LastSessionViewFactory;
use app\Domain\Repositories\DomainCategoryRepositoryInterface;
use app\Domain\Repositories\SessionRepositoryInterface;
use app\Domain\View\LastSessionDetailView;
use app\Infrastructure\Exception\NoSessionForUserException;

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