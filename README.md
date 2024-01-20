# Drupal TypeScript Generator

This is a Drupal module that generates TypeScript type definitions for certain entities. It can optionally also generate cleaned up target type definitions and functions to convert objects from the initials types to the target types (parsers).

## Installation

```
composer require drupal/typescript_generator
```

## Versions

Version 3 is Drupal 10.1+ / Drush 12 compatible only.

## Usage

The generator runs as a Drush command that needs a configuration file.

Create `config.yml` file with the following contents:

```
target_directory: definitions
entities:
  input:
    - node
    - taxonomy_term
generate_parser: true
```

This file instructs the generator to generate the files in a directory `definitions` (relative to the location of the configuration file), to generate types for the `node` and `taxonomy_term` entities and to generate target types and corresponding parsers.

Trigger the generation using

```
drush typescript_generator:generate [PATH TO CONFIGURATION FILE]/config.yml
```

## Todo

* Write more documentation on usage
* Write documentation on the internal workings and ways to extend the generator
