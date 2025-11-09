<?php

namespace Tests\Feature\Requests;

use Illuminate\Support\Arr;

abstract class Request
{
    /**
     * The payload of the request.
     *
     * @var array
     */
    protected $payload = [];

    /**
     * Make a new request instance.
     *
     * @param  mixed  $args
     */
    public static function make(...$args): static
    {
        return new static(...$args);
    }

    /**
     * Retrieve the endpoint of the request.
     */
    abstract public function endpoint(): string;

    /**
     * Retrieve the method of the request.
     */
    abstract public function method(): string;

    /**
     * Retrieve a value from the payload.
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return Arr::get($this->payload, $key);
    }

    /**
     * Check if the payload has a key.
     */
    public function has(string $key): bool
    {
        return Arr::has($this->payload, $key);
    }

    /**
     * Retrieve the payload of the request.
     */
    public function payload(): array
    {
        return $this->payload;
    }

    /**
     * Set a value of the payload.
     *
     * @return static
     */
    public function set(string $attribute, $value): self
    {
        Arr::set($this->payload, $attribute, $value);

        return $this;
    }

    /**
     * Set multiple values of the payload.
     */
    public function with(array $payload): static
    {
        $this->payload = array_merge($this->payload, $payload);

        return $this;
    }
}
