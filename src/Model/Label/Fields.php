<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Fields
{
    /** @var list<Field> */
    public array $field = [];

    /** @var list<Field>|null */
    public ?array $customField = null;

    /**
     * Adds a field, replacing any existing field with the same key.
     */
    public function set(string $key, string $value): self
    {
        foreach ($this->field as $field) {
            if ($field->key === $key) {
                $field->value = $value;

                return $this;
            }
        }

        $this->field[] = new Field($key, $value);

        return $this;
    }

    public function get(string $key): ?string
    {
        foreach ($this->field as $field) {
            if ($field->key === $key) {
                return $field->value;
            }
        }

        return null;
    }

    public function remove(string $key): self
    {
        $this->field = array_values(array_filter($this->field, static fn (Field $field): bool => $field->key !== $key));

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $fields = [];

        foreach ($this->field as $field) {
            $fields[$field->key] = $field->value;
        }

        return $fields;
    }
}
