<?php

namespace Docker\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\Api\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\Api\\Model\\TaskStatus';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\Api\\Model\\TaskStatus';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\Api\Model\TaskStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Timestamp', $data) && $data['Timestamp'] !== null) {
            $object->setTimestamp($data['Timestamp']);
        }
        elseif (\array_key_exists('Timestamp', $data) && $data['Timestamp'] === null) {
            $object->setTimestamp(null);
        }
        if (\array_key_exists('State', $data) && $data['State'] !== null) {
            $object->setState($data['State']);
        }
        elseif (\array_key_exists('State', $data) && $data['State'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('Message', $data) && $data['Message'] !== null) {
            $object->setMessage($data['Message']);
        }
        elseif (\array_key_exists('Message', $data) && $data['Message'] === null) {
            $object->setMessage(null);
        }
        if (\array_key_exists('Err', $data) && $data['Err'] !== null) {
            $object->setErr($data['Err']);
        }
        elseif (\array_key_exists('Err', $data) && $data['Err'] === null) {
            $object->setErr(null);
        }
        if (\array_key_exists('ContainerStatus', $data) && $data['ContainerStatus'] !== null) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'Docker\\Api\\Model\\TaskStatusContainerStatus', 'json', $context));
        }
        elseif (\array_key_exists('ContainerStatus', $data) && $data['ContainerStatus'] === null) {
            $object->setContainerStatus(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getTimestamp()) {
            $data['Timestamp'] = $object->getTimestamp();
        }
        if (null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if (null !== $object->getMessage()) {
            $data['Message'] = $object->getMessage();
        }
        if (null !== $object->getErr()) {
            $data['Err'] = $object->getErr();
        }
        if (null !== $object->getContainerStatus()) {
            $data['ContainerStatus'] = $this->normalizer->normalize($object->getContainerStatus(), 'json', $context);
        }
        return $data;
    }
}