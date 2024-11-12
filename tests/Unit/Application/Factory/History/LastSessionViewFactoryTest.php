<?php

namespace Tests\Unit\Application\Factory\History;

use App\Application\ViewFactory\History\LastSessionViewFactory;
use App\Domain\View\LastSessionDetailView;
use PHPUnit\Framework\TestCase;

class LastSessionViewFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $category1 = new \stdClass();
        $category1->name = 'Memory';
        $category2 = new \stdClass();
        $category2->name = 'Concentration';
        $categoryArray = [
            $category1,
            $category2,
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
