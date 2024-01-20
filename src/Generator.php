<?php

namespace Drupal\typescript_generator;

use Psr\Log\LoggerInterface;

class Generator implements GeneratorInterface {
  /**
   * @var \Drupal\typescript_generator\GeneratorInterface[]
   */
  protected $component_generators;

  public function __construct($component_generators) {
    foreach ($component_generators as $component_generator) {
      if ($component_generator instanceof GeneratorAwareInterface) {
        $component_generator->setGenerator($this);
      }
    }
    $this->component_generators = $component_generators;
  }

  public function generate($object, Settings $settings, Result $result) {
    if ($generator = $this->getGenerator($object)) {
      return $generator->generate($object, $settings, $result);
    }

    throw new \Exception("No supported Generator for " . var_export($object, TRUE));
  }

  public function supportsGeneration($object) {
    $generator = $this->getGenerator($object);
    return !empty($generator);
  }

  private function getGenerator($object) {
    foreach ($this->component_generators as $generator) {
      if ($generator instanceof GeneratorInterface && $generator->supportsGeneration($object)) {
        return $generator;
      }
    }

    return FALSE;
  }
}
