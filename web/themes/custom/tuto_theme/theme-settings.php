<?php

declare(strict_types=1);

/**
 * @file
 * Theme settings form for tuto_theme theme.
 */

use Drupal\Core\Form\FormState;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function tuto_theme_form_system_theme_settings_alter(array &$form, FormState $form_state): void {

  $form['tuto_theme'] = [
    '#type' => 'details',
    '#title' => t('tuto_theme'),
    '#open' => TRUE,
  ];

  $form['tuto_theme']['example'] = [
    '#type' => 'textfield',
    '#title' => t('Example'),
    '#default_value' => theme_get_setting('example'),
  ];

}
