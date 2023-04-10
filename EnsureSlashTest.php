<?php

class EnsureSlashTest extends \PHPUnit\Framework\TestCase {
    protected function setUp(): void
    {
        parent::setUp();

        require_once "ensure_slash.php";
    }

    public function test_ensure_slash_helper() {
        $cases = [
            [
                "input" => "/docs/v1#places-by-postal-code",
                "output" => "/docs/v1/#places-by-postal-code",
            ],
            [
                "input" => "/docs/v1/#places-by-postal-code",
                "output" => "/docs/v1/#places-by-postal-code",
            ],
        ];

        foreach ($cases as $case) {
            $this->assertEquals(ensure_slash($case['input']), $case['output']);
        }
    }
}