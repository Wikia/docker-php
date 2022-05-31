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
class ImageRootFSNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\Api\\Model\\ImageRootFS';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\Api\\Model\\ImageRootFS';
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
        $object = new \Docker\Api\Model\ImageRootFS();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
            $object->setType($data['Type']);
        }
        elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('Layers', $data) && $data['Layers'] !== null) {
            $values = array();
            foreach ($data['Layers'] as $value) {
                $values[] = $value;
            }
            $object->setLayers($values);
        }
        elseif (\array_key_exists('Layers', $data) && $data['Layers'] === null) {
            $object->setLayers(null);
        }
        if (\array_key_exists('BaseLayer', $data) && $data['BaseLayer'] !== null) {
            $object->setBaseLayer($data['BaseLayer']);
        }
        elseif (\array_key_exists('BaseLayer', $data) && $data['BaseLayer'] === null) {
            $object->setBaseLayer(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['Type'] = $object->getType();
        if (null !== $object->getLayers()) {
            $values = array();
            foreach ($object->getLayers() as $value) {
                $values[] = $value;
            }
            $data['Layers'] = $values;
        }
        if (null !== $object->getBaseLayer()) {
            $data['BaseLayer'] = $object->getBaseLayer();
        }
        return $data;
    }
}