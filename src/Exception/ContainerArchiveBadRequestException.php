<?php

namespace Docker\Api\Exception;

class ContainerArchiveBadRequestException extends \RuntimeException implements ClientException
{
    private $containersIdArchiveGetResponse400;
    public function __construct(\Docker\Api\Model\ContainersIdArchiveGetResponse400 $containersIdArchiveGetResponse400)
    {
        parent::__construct('Bad parameter', 400);
        $this->containersIdArchiveGetResponse400 = $containersIdArchiveGetResponse400;
    }
    public function getContainersIdArchiveGetResponse400()
    {
        return $this->containersIdArchiveGetResponse400;
    }
}