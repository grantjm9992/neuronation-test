<?php

namespace Tests\Unit\Infrasructure\Controllers\History;

use App\Application\Query\GetCategoriesFromLastSessionQueryHandler;
use App\Application\Services\Auth\Session\GetLoggedInUserServiceInterface;
use App\Domain\View\LastSessionDetailView;
use App\Infrastructure\Controllers\History\GetCategoriesForLastSessionController;
use PHPUnit\Framework\TestCase;

class GetCategoriesForLastSessionControllerTest extends TestCase
{
    public function testGetCategoriesForLastSession(): void
    {
        $queryHandler = $this->createMock(GetCategoriesFromLastSessionQueryHandler::class);
        $queryHandler->expects($this->once())
            ->method('__invoke')
            ->willReturn(
                new LastSessionDetailView(['Test category'])
            );

        $getUserService = $this->createMock(GetLoggedInUserServiceInterface::class);
        $getUserService->expects($this->once())
            ->method('getUserId')
            ->willReturn(1);

        $controller = new GetCategoriesForLastSessionController(
            $queryHandler,
            $getUserService
        );

        $controller->__invoke();
    }
}
