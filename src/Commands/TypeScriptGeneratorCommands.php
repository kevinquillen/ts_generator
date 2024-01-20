<?php

namespace Drupal\typescript_generator\Commands;

use Drupal\typescript_generator\Result;
use Drupal\typescript_generator\Settings;
use Drush\Commands\DrushCommands;
use Drush\Attributes as CLI;

/**
 * tbd
 */
class TypeScriptGeneratorCommands extends DrushCommands {

  /**
   * Generate TypeScript definitions.
   */
  #[CLI\Command(name: 'typescript_generator:generate', aliases: ['tsg'])]
  #[CLI\Argument(name: 'filename', description: 'Path to configuration file containing instructions on what entities to generate definitions for.')]
  #[CLI\Usage(name: 'drush typescript_generator:generate /path/to/config.yml', description: 'Generates TypeScript definitions for Drupal entities based off of the given configuration file.')]
  public function generate(string $filename) {
    if (!file_exists($filename)) {
      $this->logger()->error(dt('The specified configuration file does not exist.'));
    }

    $working_directory = dirname($filename);
    $settings = Settings::loadFile($filename);

    /** @var \Drupal\typescript_generator\GeneratorInterface $generator */
    $generator = \Drupal::service('typescript_generator.generator');

    $entity_type_manager = \Drupal::entityTypeManager();

    $result = new Result();
    $generator->generate($entity_type_manager, $settings, $result);

    $target_directory = $working_directory . '/' . $settings->get('target_directory');
    $result->write($target_directory);
  }
}
