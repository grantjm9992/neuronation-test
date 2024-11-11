<?php

namespace App\Application\ViewFactory;

trait AbstractViewFactory
{
    public static function createCollection($collection): array
    {
        $returnArray = [];
        foreach ($collection as $item) {
            $returnArray[] = static::create($item);
        }

        return $returnArray;
    }
}