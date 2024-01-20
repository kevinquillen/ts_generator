<?php

namespace Drupal\typescript_generator\ComponentGenerator\Data;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class NumberGenerator extends DataGeneratorBase {
  protected $supportedDataType = ['integer'];

  protected function getDataType($object, Settings $settings, Result $result, ComponentResult $component_result) {
    return 'number';
  }
}
