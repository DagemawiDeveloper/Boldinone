<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Feature tests exercise Blade pages, but CI does not need a compiled
        // Vite manifest to validate server-side application behavior.
        $this->withoutVite();
    }
}
