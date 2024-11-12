<?php

namespace App\Infrastructure\Controllers\History;

use App\Application\Query\GetSessionHistoryForUserQuery;
use App\Application\Query\GetSessionHistoryForUserQueryHandler;
use App\Application\Services\Auth\Session\GetLoggedInUserServiceInterface;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GetSessionHistoryController extends Controller
{
    public function __construct(
        private readonly GetSessionHistoryForUserQueryHandler $handler,
        private readonly GetLoggedInUserServiceInterface $getLoggedInUserService,
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $query = new GetSessionHistoryForUserQuery(
            userId: $this->getLoggedInUserService->getUserId(),
            limit: 12
        );

        $response = $this->handler->__invoke(
            query: $query
        );

        return new JsonResponse(
            data: $response
        );
    }
}