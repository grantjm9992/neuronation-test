<?php

namespace app\Domain\View;

class HistoryView
{
    public function __construct(
        public int $score,
        public int $timestamp,
    ) {
    }
}
