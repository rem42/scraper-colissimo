<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Factory;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Colissimo APIs use camelCase keys: unlike the core serializer, no snake_case name conversion is applied.
 */
final class SerializerFactory
{
    /** Context used to build request bodies: optional fields are omitted rather than sent empty, as recommended by Colissimo. */
    public const array REQUEST_CONTEXT = [
        AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
        DateTimeNormalizer::FORMAT_KEY => 'Y-m-d',
    ];

    /** Context used to read responses: Colissimo does not always respect scalar types (e.g. numeric codes). */
    public const array RESPONSE_CONTEXT = [
        AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
    ];

    private static ?Serializer $shared = null;

    public static function getShared(): Serializer
    {
        return self::$shared ??= self::create();
    }

    public static function create(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);

        return new Serializer(
            [
                new DateTimeNormalizer(),
                new ArrayDenormalizer(),
                new ObjectNormalizer(
                    $classMetadataFactory,
                    new MetadataAwareNameConverter($classMetadataFactory),
                    PropertyAccess::createPropertyAccessor(),
                    $extractor,
                ),
            ],
            ['json' => new JsonEncoder()],
        );
    }
}
