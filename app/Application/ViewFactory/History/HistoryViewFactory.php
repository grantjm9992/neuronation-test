<?php

namespace App\Application\ViewFactory\History;

use App\Application\ViewFactory\AbstractViewFactory;
use app\Domain\View\HistoryView;
use Illuminate\Database\Eloquent\Collection;

class HistoryViewFactory
{
    use AbstractViewFactory;

    public static function create(
        array $session
    ): HistoryView {
        return new HistoryView(
            $session['score'],
            $session['timestamp'],
        );
    }
}