<?php

namespace Docker\Api\Exception;

class ConfigInspectNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\Docker\Api\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('config not found', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}