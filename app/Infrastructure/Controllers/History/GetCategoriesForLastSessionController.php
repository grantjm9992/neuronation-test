<?php

namespace app\Infrastructure\Controllers\History;

use App\Application\Query\GetCategoriesFromLastSessionQuery;
use App\Application\Query\GetCategoriesFromLastSessionQueryHandler;
use app\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GetCategoriesForLastSessionController extends Controller
{
    public function __construct(
        private readonly GetCategoriesFromLastSessionQueryHandler $handler
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $query = new GetCategoriesFromLastSessionQuery(
            userId: $this->getUserId()
        );

        $response = $this->handler->__invoke(
            query: $query
        );

        return new JsonResponse(
            data: $response
        );
    }
}