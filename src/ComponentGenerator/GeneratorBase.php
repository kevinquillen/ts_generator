<?php

namespace Drupal\typescript_generator\ComponentGenerator;

use Drupal\typescript_generator\ComponentResult;
use Drupal\typescript_generator\GeneratorAwareInterface;
use Drupal\typescript_generator\GeneratorAwareTrait;
use Drupal\typescript_generator\GeneratorInterface;
use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;

abstract class GeneratorBase implements GeneratorInterface, GeneratorAwareInterface {
  use GeneratorAwareTrait, NoopParserGenerator;

  /**
   * @param $object
   * @param \Drupal\typescript_generator\Settings $settings
   * @param \Drupal\typescript_generator\Result $result
   * @param \Drupal\typescript_generator\ComponentResultInterface $componentResult
   * @return string
   */
  abstract protected function generateType($object, Settings $settings, Result $result, ComponentResult $componentResult);

  /**
   * @param $object
   * @param \Drupal\typescript_generator\Settings $settings
   * @param \Drupal\typescript_generator\Result $result
   * @param \Drupal\typescript_generator\ComponentResultInterface $componentResult
   * @return string
   */
  protected function generateTargetType($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    return $componentResult->getComponent('type');
  }

  /**
   * @param $object
   * @param \Drupal\typescript_generator\Settings $settings
   * @param \Drupal\typescript_generator\Result $result
   * @param \Drupal\typescript_generator\ComponentResultInterface $componentResult
   * @return string
   */
  protected function generateParser($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    return $this->generateNoopParser($settings, $result, $componentResult) . '<' . $componentResult->getComponent('type') . '>';
  }

  protected function preGenerate($object, Settings $settings, Result $result, ComponentResult $componentResult) {}
  protected function postGenerate($object, Settings $settings, Result $result, ComponentResult $componentResult) {}

  protected function generateWithComponentResult($object, Settings $settings, Result $result, ComponentResult $componentResult) {
    $this->preGenerate($object, $settings, $result, $componentResult);

    $componentResult->setComponent('type', $this->generateType($object, $settings, $result, $componentResult));
    if ($settings->generateParser()) {
      $componentResult->setComponent('target_type', $this->generateTargetType($object, $settings, $result, $componentResult));
      $componentResult->setComponent('parser', $this->generateParser($object, $settings, $result, $componentResult));
    }

    $this->postGenerate($object, $settings, $result, $componentResult);
  }

  /**
   * @param $object
   * @param \Drupal\typescript_generator\Settings $settings
   * @param \Drupal\typescript_generator\Result $result
   * @return \Drupal\typescript_generator\ComponentResultInterface
   */
  public function generate($object, Settings $settings, Result $result) {
    $componentResult = new ComponentResult();

    $this->generateWithComponentResult($object, $settings, $result, $componentResult);

    return $componentResult;
  }
}
