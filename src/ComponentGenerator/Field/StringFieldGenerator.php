<?php

namespace Drupal\typescript_generator\ComponentGenerator\Field;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class StringFieldGenerator extends FieldGenerator {
  protected $supportedFieldType = ['string', 'string_long', 'telephone'];

  protected function getItemName($object, Settings $settings, Result $result, ComponentResult $component_result) {
    return 'StringItem';
  }
}
