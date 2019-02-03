<?php declare(strict_types=1);

namespace App\Aquarium\Notifier;

abstract class AbstractNotifier
{
    protected function send(string $from, string $to, string $content): void
    {
        // TODO: Implement send() method.
    }
}
