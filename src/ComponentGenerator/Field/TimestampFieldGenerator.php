<?php

namespace Drupal\typescript_generator\ComponentGenerator\Field;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;
use Symfony\Component\DependencyInjection\Container;

class TimestampFieldGenerator extends FieldGenerator {
  protected $supportedFieldType = ['created', 'timestamp', 'changed'];

  protected function getItemName($object, Settings $settings, Result $result, ComponentResult $component_result) {
    return 'TimestampItem';
  }

  protected function getItemProperties($object, Settings $settings, Result $result, ComponentResult $component_result) {
    $properties = parent::getItemProperties($object, $settings, $result, $component_result);
    $properties['format'] = "'Y-m-d\\\\TH:i:sP'";

    return $properties;
  }

  public function getItemMapping($object, $properties, Settings $settings, Result $result, ComponentResult $componentResult) {
    return 'value';
  }
}
