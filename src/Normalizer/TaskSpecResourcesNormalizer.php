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
class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\Api\\Model\\TaskSpecResources';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\Api\\Model\\TaskSpecResources';
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
        $object = new \Docker\Api\Model\TaskSpecResources();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Limits', $data) && $data['Limits'] !== null) {
            $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Docker\\Api\\Model\\ResourceObject', 'json', $context));
        }
        elseif (\array_key_exists('Limits', $data) && $data['Limits'] === null) {
            $object->setLimits(null);
        }
        if (\array_key_exists('Reservation', $data) && $data['Reservation'] !== null) {
            $object->setReservation($this->denormalizer->denormalize($data['Reservation'], 'Docker\\Api\\Model\\ResourceObject', 'json', $context));
        }
        elseif (\array_key_exists('Reservation', $data) && $data['Reservation'] === null) {
            $object->setReservation(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getLimits()) {
            $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
        }
        if (null !== $object->getReservation()) {
            $data['Reservation'] = $this->normalizer->normalize($object->getReservation(), 'json', $context);
        }
        return $data;
    }
}