<?php

namespace Drupal\typescript_generator;


interface GeneratorAwareInterface {
  public function setGenerator(GeneratorInterface $generator);
}
