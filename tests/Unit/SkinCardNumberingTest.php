<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SkinCardNumberingTest extends TestCase
{
    public function test_skin_cards_are_renumbered_after_removal(): void
    {
        $source = file_get_contents($this->sourcePath('resources/js/welcome.js'));

        $this->assertIsString($source);
        $this->assertStringContainsString('function renumberSkinCards()', $source);
        $this->assertMatchesRegularExpression(
            '/element\.remove\(\);\s+renumberSkinCards\(\);\s+schedulePersistWelcomeInputs\(\);/s',
            $source,
            'Skin cards must be renumbered immediately after the removed card leaves the DOM.'
        );
        $this->assertStringContainsString('numberLabel.textContent = `SKIN ${skinNumber}`;', $source);
        $this->assertStringContainsString('removeButton.dataset.skinId = String(skinNumber);', $source);
    }

    private function sourcePath(string $path): string
    {
        return dirname(__DIR__, 2).DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $path);
    }
}
