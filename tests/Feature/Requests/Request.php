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
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    abstract public function endpoint(): string;

    /**
     * Retrieve the method of the request.
     *
     * @return string
     */
    abstract public function method(): string;

    /**
     * Retrieve a value from the payload.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get(string $key)
    {
        return Arr::get($this->payload, $key);
    }

    /**
     * Check if the payload has a key.
     *
     * @param  string  $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return Arr::has($this->payload, $key);
    }

    /**
     * Make a new request instance.
     *
     * @param  mixed  $args
     * @return static
     */
    public static function make(...$args): static
    {
        return new static(...$args);
    }

    /**
     * Retrieve the payload of the request.
     *
     * @return array
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
     *
     * @param  array  $payload
     * @return static
     */
    public function with(array $payload): static
    {
        $this->payload = array_merge($this->payload, $payload);

        return $this;
    }
}
