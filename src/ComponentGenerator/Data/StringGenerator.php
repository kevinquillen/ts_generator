<?php

namespace Drupal\typescript_generator\ComponentGenerator\Data;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class StringGenerator extends DataGeneratorBase {
  protected $supportedDataType = ['string', 'email', 'uri'];

  protected function getDataType($object, Settings $settings, Result $result, ComponentResult $component_result) {
    return 'string';
  }
}
