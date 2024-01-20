<?php

namespace Drupal\typescript_generator\ComponentGenerator\Data;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class BooleanGenerator extends DataGeneratorBase {
  protected $supportedDataType = ['boolean'];

  protected function getDataType($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    return 'boolean';
  }
}
