<?php

namespace Tests\Feature\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Tests\Feature\Requests\Request;

trait SendsRequests
{
    /**
     * Detect the request class name from the test case.
     *
     * @return string
     */
    protected function detectRequestClass(): string
    {
        return Str::of(get_called_class())
            ->replaceLast('Test', 'Request')
            ->replaceLast('Feature\\', 'Feature\Requests\\');
    }

    /**
     * Create a new request instance.
     *
     * @param  mixed  $args
     * @return Request
     */
    protected function newRequest(...$args): Request
    {
        $request = $this->detectRequestClass();

        if (empty($args)) {
            return resolve($request);
        }

        return $request::make(...$args);
    }

    /**
     * Send a request to the server.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequest(...$args): TestResponse
    {
        $request = Arr::get($args, 0);

        if (!$request instanceof Request) {
            $request = $this->newRequest(...$args);
        }

        return $this->json(
            $request->method(),
            $request->endpoint(),
            $request->payload(),
        );
    }

    /**
     * Send a request get list to the server.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiGetList(...$args): TestResponse
    {
        $request = Arr::get($args, 0);

        return $this->jsonApi()
            ->expects($request->expects())
            ->query($request->getQuery())
            ->filter($request->getFilters())
            ->get($request->endpoint());
    }

    /**
     * Send a request get show to the server.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiGetShow(...$args): TestResponse
    {
        $request = Arr::get($args, 0);

        return $this->jsonApi()
            ->get($request->endpoint());
    }

    /**
     * Send a post request to the server json api.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiPostWithPayload(...$args): TestResponse
    {
        $request = Arr::get($args, 0);

        return $this
            ->jsonApi()
            ->asFormUrlEncoded()
            ->withPayload($request->payload())
            ->post($request->endpoint());
    }

    /**
     * Send a post request to the server json api.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiPostWithPayloadAndToken(...$args): TestResponse
    {
        $request = Arr::get($args, 0);
        $token = Arr::get($args, 1);

        return $this
            ->jsonApi()
            ->asFormUrlEncoded()
            ->withPayload($request->payload())
            ->withHeader('Authorization', "Bearer {$token}")
            ->post($request->endpoint());
    }

    /**
     * Send a post request to the server json api.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiPostWithData(...$args): TestResponse
    {
        $request = Arr::get($args, 0);

        $data['type'] = $request->type();
        $data['attributes'] = $request->payload();

        if(count($request->relationships())) {
            $data['relationships'] = $request->relationships();
        }

        return $this
            ->jsonApi()
            ->withData($data)
            ->post($request->endpoint());
    }

    /**
     * Send a patch request to the server json api.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiPatchWithData(...$args): TestResponse
    {

        $request = Arr::get($args, 0);
        $data['type'] = $request->type();
        $data['id'] = $request->modelUuid();
        $data['attributes'] = $request->payload();

        return $this
            ->jsonApi()
            ->withData($data)
            ->patch($request->endpoint());
    }

    /**
     * Send a patch request to the server json api.
     *
     * @param  mixed  $args
     * @return TestResponse
     */
    protected function sendRequestApiDelete(...$args): TestResponse
    {
        $request = Arr::get($args, 0);

        return $this
            ->jsonApi()
            ->delete($request->endpoint());
    }
}
