<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Model;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Model\Label\FieldKey;
use Scraper\ScraperColissimo\Model\Label\Fields;
use Scraper\ScraperColissimo\Model\Label\GenerateLabel;

/**
 * @internal
 */
#[CoversClass(GenerateLabel::class)]
#[CoversClass(Fields::class)]
final class GenerateLabelTest extends TestCase
{
    public function testFieldsAreCreatedLazilyAndReplaced(): void
    {
        $generateLabel = new GenerateLabel();
        $this->assertNull($generateLabel->fields);

        $generateLabel->setEori('FR123456789', 'US987654321');
        $generateLabel->setEori('FR000000001');

        $this->assertSame([
            FieldKey::EORI => 'FR000000001',
            FieldKey::EORI_ADDRESSEE => 'US987654321',
        ], $generateLabel->fields?->toArray());
    }

    public function testDimensions(): void
    {
        $generateLabel = new GenerateLabel()->setDimensions(30, 20, 10);

        $this->assertSame('30', $generateLabel->getField(FieldKey::LENGTH));
        $this->assertSame('20', $generateLabel->getField(FieldKey::WIDTH));
        $this->assertSame('10', $generateLabel->getField(FieldKey::HEIGHT));
    }

    public function testMultiParcelFollower(): void
    {
        $generateLabel = new GenerateLabel()->setMultiParcelFollower(1, 3);

        $this->assertSame([
            FieldKey::TYPE_MULTI_PARCEL => 'FOLLOWER',
            FieldKey::PARCEL_ITERATION_NUMBER => '1',
            FieldKey::TOTAL_NUMBER_PARCEL => '3',
        ], $generateLabel->fields?->toArray());
    }

    public function testMultiParcelMaster(): void
    {
        $generateLabel = new GenerateLabel()->setMultiParcelMaster(3, 3, ['8Q53764663714', '8Q53764663721']);

        $this->assertSame([
            FieldKey::TYPE_MULTI_PARCEL => 'MASTER',
            FieldKey::PARCEL_ITERATION_NUMBER => '3',
            FieldKey::TOTAL_NUMBER_PARCEL => '3',
            FieldKey::LIST_FOLLOWER_PARCEL => '8Q53764663714/8Q53764663721',
        ], $generateLabel->fields?->toArray());
    }

    public function testMultiParcelMasterRequiresFollowers(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new GenerateLabel()->setMultiParcelMaster(1, 2, []);
    }

    public function testMultiParcelMasterLimit(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new GenerateLabel()->setMultiParcelMaster(6, 6, ['1', '2', '3', '4', '5', '6']);
    }

    public function testMultiParcelInvalidIteration(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new GenerateLabel()->setMultiParcelFollower(4, 3);
    }
}
