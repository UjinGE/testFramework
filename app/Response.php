<?php

namespace app;

/**
 * Class Response
 *
 * @todo remove echo from response. Need __toString method;
 * @todo need class hierarchy for many types of Response
 * @todo need handle response code and headers
 */
class Response{

    public function __construct(string $response, int $code = 200, string $contentType = 'application/json')
    {
        http_response_code($code);
        header('Content-Type: ' . $contentType);
        echo $response;
    }

}