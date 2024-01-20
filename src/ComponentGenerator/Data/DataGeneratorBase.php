<?php

namespace Drupal\typescript_generator\ComponentGenerator\Data;

use Drupal\Core\TypedData\DataDefinitionInterface;
use Drupal\typescript_generator\ComponentGenerator\GeneratorBase;
use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

abstract class DataGeneratorBase extends GeneratorBase {
  protected $supportedDataType;

  abstract protected function getDataType($object, Settings $settings, Result $result, ComponentResult $componentResult);

  public function supportsGeneration($object) {
    if (!($object instanceof DataDefinitionInterface)) {
      return FALSE;
    }

    $supported = (array) $this->supportedDataType;

    return !isset($this->supportedDataType) || in_array($object->getDataType(), $supported);
  }

  /**
   * @inheritdoc
   */
  public function generateType($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    /** @var \Drupal\Core\TypedData\DataDefinitionInterface $object */
    $componentResult->setComponent('base_type', $this->getDataType($object, $settings, $result, $componentResult));
    return $object->isRequired() ? $componentResult->getComponent('base_type') : $componentResult->getComponent('base_type') . ' | null';
  }
}
