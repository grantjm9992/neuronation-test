<?php

namespace Tests\Unit\Infrastructure\Controllers\History;

use App\Application\Query\GetSessionHistoryForUserQueryHandler;
use App\Application\Services\Auth\Session\GetLoggedInUserServiceInterface;
use App\Domain\View\HistoryView;
use App\Infrastructure\Controllers\History\GetSessionHistoryController;
use PHPUnit\Framework\TestCase;

class GetSessionHistoryControllerTest extends TestCase
{
    public function testSuccess(): void
    {
        $queryHandler = $this->createMock(GetSessionHistoryForUserQueryHandler::class);
        $queryHandler->expects($this->once())
            ->method('__invoke')
            ->willReturn(
                [new HistoryView(1, 1)]
            );

        $getUserService = $this->createMock(GetLoggedInUserServiceInterface::class);
        $getUserService->expects($this->once())
            ->method('getUserId')
            ->willReturn(1);
        $controller = new GetSessionHistoryController(
            $queryHandler,
            $getUserService
        );

        $controller->__invoke();
    }
}