<?php

namespace Drupal\typescript_generator;

trait GeneratorAwareTrait {
  /**
   * @var \Drupal\typescript_generator\GeneratorInterface
   */
  protected $generator;

  /**
   * @param GeneratorInterface $generator
   */
  public function setGenerator(GeneratorInterface $generator) {
    $this->generator = $generator;
  }
}
