<?php

namespace Vinelab\Http;

/**
 * The HTTP Client.
 *
 * Dynamically calls a method that sends the corresponding request.
 *
 * @author Abed Halawi <abed.halawi@vinelab.com>
 *
 * @since 1.0.0
 */
class Client
{
    /**
     * Validates passed request parameters.
     *
     * @param string|array $request
     *
     * @return bool
     */
    protected function valid($request)
    {
        return (boolean) array_key_exists('url', $request);
    }

    /**
     * Makes a Vinelab\Http\Request object out of an array.
     *
     * @param array|string $request
     *
     * @return Vinelab\Http\Request
     */
    private function requestInstance($request)
    {
        return new Request($request);
    }

    public function __call($method, $arguments)
    {
        $request = array_pop($arguments);

        // add support to sending requests to url's only
        if (!is_array($request)) {
            $request = ['url' => $request];
        }

        if ($this->valid($request)) {
            $request['method'] = Request::method($method);
            $this->request = $this->requestInstance($request);

            return $this->request->send();
        }

        throw new \Exception('Invalid Request Params sent to HttpClient');
    }
}
