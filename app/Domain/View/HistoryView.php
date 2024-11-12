<?php

namespace App\Domain\View;

class HistoryView
{
    public function __construct(
        public int $score,
        public string $normalizedScore,
        public int $timestamp,
    ) {
    }
}
