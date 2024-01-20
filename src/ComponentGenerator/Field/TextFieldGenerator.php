<?php

namespace Drupal\typescript_generator\ComponentGenerator\Field;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class TextFieldGenerator extends FieldGenerator {
  protected $supportedFieldType = ['text', 'text_long'];

  protected function getItemName($object, Settings $settings, Result $result, ComponentResult $component_result) {
    return 'TextItem';
  }
}
