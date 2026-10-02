<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model;

/**
 * Colissimo credentials: the API key ("Clé de connexion aux Web Services", generated in the Colissimo Box)
 * is the recommended authentication. Login/password is only accepted by the Documents and Tracking APIs.
 */
final readonly class Credential
{
    private function __construct(
        public ?string $apiKey = null,
        public ?string $login = null,
        public ?string $password = null,
    ) {}

    public static function apiKey(string $apiKey): self
    {
        return new self(apiKey: $apiKey);
    }

    public static function login(string $login, string $password): self
    {
        return new self(login: $login, password: $password);
    }

    public function isApiKey(): bool
    {
        return null !== $this->apiKey;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        if (null !== $this->apiKey) {
            return ['apiKey' => $this->apiKey];
        }

        return ['login' => (string) $this->login, 'password' => (string) $this->password];
    }
}
