<?php

namespace Drupal\typescript_generator;

interface GeneratorInterface {
  /**
   * @param $object
   * @param \Drupal\typescript_generator\Settings $settings
   * @param \Drupal\typescript_generator\Result $result
   * @return \Drupal\typescript_generator\ComponentResultInterface
   */
  public function generate($object, Settings $settings, Result $result);

  /**
   * @param $object
   * @return bool
   */
  public function supportsGeneration($object);
}
