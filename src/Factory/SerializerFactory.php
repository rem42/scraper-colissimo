<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Factory;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerFactory
{
    public static function create(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());

        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $encoders = ['json' => new JsonEncoder()];
        $normalizers = [
            new DateTimeNormalizer([
                DateTimeNormalizer::FORMAT_KEY => 'Y-m-d',
            ]),
            new ObjectNormalizer(
                $classMetadataFactory,
                $metadataAwareNameConverter,
                PropertyAccess::createPropertyAccessor(),
                new ReflectionExtractor(),
                null,
                null,
                [
                    AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
                ]
            ),
            new PropertyNormalizer(),
            new DataUriNormalizer(),
            new ArrayDenormalizer(),
        ];

        return new Serializer($normalizers, $encoders);
    }
}
