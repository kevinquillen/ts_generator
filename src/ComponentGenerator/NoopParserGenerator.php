<?php

namespace Drupal\typescript_generator\ComponentGenerator;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

trait NoopParserGenerator {
  /**
   * @param \Drupal\typescript_generator\Settings $settings
   * @param \Drupal\typescript_generator\Result $result
   * @param \Drupal\typescript_generator\ComponentResultInterface $componentResult
   * @return string
   */
  protected function generateNoopParser(Settings $settings, Result $result, ComponentResult $componentResult) {
    return $result->setComponent('parser/noop_parser', 'const noop_parser = <T>(t: T): T => t');
  }
}
