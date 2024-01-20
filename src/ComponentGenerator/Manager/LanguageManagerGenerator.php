<?php

namespace Drupal\typescript_generator\ComponentGenerator\Manager;


use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\typescript_generator\ComponentGenerator\GeneratorBase;
use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

class LanguageManagerGenerator extends GeneratorBase {

  protected function generateType($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    /** @var $object \Drupal\Core\Language\LanguageManagerInterface */

    $languages = $object->getLanguages();
    $langcodes = [];
    foreach ($languages as $language) {
      $langcodes[] = '\'' . $language->getId() . '\'';
    }

    return $result->setComponent('types/Language', "type Language = " . implode(' | ', $langcodes));
  }

  public function supportsGeneration($object) {
    return ($object instanceof LanguageManagerInterface);
  }
}
