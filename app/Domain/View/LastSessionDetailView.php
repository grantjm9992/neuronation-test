<?php

namespace App\Domain\View;

class LastSessionDetailView
{
    public string $message;
    public function __construct(
        array $categories
    ) {
        $this->message = 'Recently trained: ' . implode(', ', $categories);
    }
}