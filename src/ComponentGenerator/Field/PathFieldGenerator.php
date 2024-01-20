<?php

namespace Drupal\typescript_generator\ComponentGenerator\Field;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class PathFieldGenerator extends FieldGenerator {
  protected $supportedFieldType = ['path'];

  public function getItemMapping($object, $properties, Settings $settings, Result $result, ComponentResult $componentResult) {
    return 'alias';
  }

  public function generateType($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    return parent::generateType($object, $settings, $result, $componentResult) . " | undefined";
  }
}
