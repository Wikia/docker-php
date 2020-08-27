<?php

namespace Docker\Api\Endpoint;

class NetworkDisconnect extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param \Docker\Api\Model\NetworksIdDisconnectPostBody $container 
     */
    public function __construct(string $id, \Docker\Api\Model\NetworksIdDisconnectPostBody $container)
    {
        $this->id = $id;
        $this->body = $container;
    }
    use \Jane\OpenApiRuntime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/networks/{id}/disconnect');
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
     * @throws \Docker\Api\Exception\NetworkDisconnectForbiddenException
     * @throws \Docker\Api\Exception\NetworkDisconnectNotFoundException
     * @throws \Docker\Api\Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (403 === $status) {
            throw new \Docker\Api\Exception\NetworkDisconnectForbiddenException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \Docker\Api\Exception\NetworkDisconnectNotFoundException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\NetworkDisconnectInternalServerErrorException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}