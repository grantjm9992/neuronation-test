<?php

namespace App\Application\ViewFactory\History;

use App\Domain\View\LastSessionDetailView;

class LastSessionViewFactory
{
    public static function create(array $categories): LastSessionDetailView
    {
        $categoryNames = array_map(
            callback: function ($row) {
                return $row->name;
            },
            array: $categories
        );

        return new LastSessionDetailView(
            array_unique($categoryNames)
        );
    }
}