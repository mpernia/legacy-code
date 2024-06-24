<?php

namespace Src\Tests\Feature;

use PHPUnit\Framework\TestCase;

define('ABSOLUTE_PATH', dirname(__DIR__, 1));

class PHPStanTest extends TestCase
{
    const CODE = 'Shared/DeprecatedCode.php';

    public function testPHPStanDetectsDeprecatedCode(): void
    {
        $deprecatedCodeFile = sprintf('%s/%s', ABSOLUTE_PATH, self::CODE);
        $command = "vendor/bin/phpstan analyse $deprecatedCodeFile --level max --error-format=json";
        exec($command, $output, $returnVar);
        $outputString = implode("\n", $output);

        $result = json_decode($outputString, true);
        $this->assertNotEmpty($result['files'], 'PHPStan did not analyze any files.');
        $this->assertNotEmpty($result['files'][$deprecatedCodeFile]['messages'], 'PHPStan did not find any issues.');

        $messages = array_column($result['files'][$deprecatedCodeFile]['messages'], 'message');
        $this->assertStringContainsString('Function create_function not found.', implode("\n", $messages), 'PHPStan did not detect the deprecated create_function.');
        $this->assertStringContainsString('Function each not found.', implode("\n", $messages), 'PHPStan did not detect the deprecated each.');
    }
}
