<?php

namespace App\Infrastructure\Controllers\History;

use App\Application\Query\GetCategoriesFromLastSessionQuery;
use App\Application\Query\GetCategoriesFromLastSessionQueryHandler;
use App\Application\Services\Auth\Session\GetLoggedInUserServiceInterface;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GetCategoriesForLastSessionController extends Controller
{
    public function __construct(
        private readonly GetCategoriesFromLastSessionQueryHandler $handler,
        private readonly GetLoggedInUserServiceInterface $getLoggedInUserService
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $query = new GetCategoriesFromLastSessionQuery(
            userId: $this->getLoggedInUserService->getUserId()
        );

        $response = $this->handler->__invoke(
            query: $query
        );

        return new JsonResponse(
            data: $response
        );
    }
}