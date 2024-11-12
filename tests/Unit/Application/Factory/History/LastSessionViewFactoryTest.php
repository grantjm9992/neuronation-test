<?php

namespace Tests\Unit\Application\Factory\History;

use App\Application\ViewFactory\History\LastSessionViewFactory;
use App\Domain\View\LastSessionDetailView;
use PHPUnit\Framework\TestCase;

class LastSessionViewFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $categoryArray = [
            [
                'id' => 1,
                'name' => 'Memory',
            ],
            [
                'id' => 2,
                'name' => 'Concentration',
            ],
        ];
        $viewFactory = new LastSessionViewFactory();
        $view = $viewFactory::create($categoryArray);
        $this->assertInstanceOf(
            expected: LastSessionDetailView::class,
            actual: $view,
        );
        $this->assertEquals(
            expected: 'Recently trained: Memory, Concentration',
            actual: $view->message
        );
    }
}
