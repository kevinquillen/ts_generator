<?php

namespace Drupal\typescript_generator\ComponentGenerator\Field;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class FileUriFieldGenerator extends FieldGenerator {
  protected $supportedFieldType = ['file_uri'];

  public function getItemMapping($object, $properties, Settings $settings, Result $result, ComponentResult $componentResult) {
    return 'url';
  }
}
