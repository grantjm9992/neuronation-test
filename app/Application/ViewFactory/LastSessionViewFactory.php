<?php

namespace App\Application\ViewFactory;

use app\Domain\View\LastSessionDetailView;

class LastSessionViewFactory
{
    public static function create(array $categories): LastSessionDetailView
    {
        return new LastSessionDetailView(
            array_map(
                callback: function ($row) {
                    return $row['name'];
                },
                array: $categories
            )
        );
    }
}