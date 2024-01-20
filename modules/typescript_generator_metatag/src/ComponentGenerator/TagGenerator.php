<?php

namespace Drupal\typescript_generator_metatag\ComponentGenerator;

use Drupal\metatag\MetatagTagPluginManager;
use Drupal\typescript_generator\ComponentGenerator\PropertiesGenerator;
use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

trait TagGenerator {

  protected function generateTags(MetatagTagPluginManager $metatagTagPluginManager, Settings $settings, Result $result, ComponentResult $componentResult) {
    $tags = $metatagTagPluginManager->getDefinitions();

    $properties = [];
    foreach ($tags as $tag) {
      $key = $tag['name'];

      $properties[$key . '?'] = 'string';
    }

    return $result->setComponent(
      'types/Metatags',
      'type Metatags = ' . $this->formatObject([], $properties)
    );
  }
}
