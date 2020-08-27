<?php

namespace Docker\Api\Endpoint;

class SystemAuth extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
    * Validate credentials for a registry and, if available, get an identity
    token for accessing the registry without password.
    
    *
    * @param \Docker\Api\Model\AuthConfig $authConfig Authentication to check
    */
    public function __construct(\Docker\Api\Model\AuthConfig $authConfig)
    {
        $this->body = $authConfig;
    }
    use \Jane\OpenApiRuntime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/auth';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\Api\Exception\SystemAuthInternalServerErrorException
     *
     * @return null|\Docker\Api\Model\AuthPostResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Docker\\Api\\Model\\AuthPostResponse200', 'json');
        }
        if (204 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\SystemAuthInternalServerErrorException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}