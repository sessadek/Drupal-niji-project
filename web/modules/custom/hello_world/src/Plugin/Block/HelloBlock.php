<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'Hello' Block.
 */

#[Block(
  id: "hello_block",
  admin_label: new TranslatableMarkup("Hello block"),
  category: new TranslatableMarkup("Hello World")
)]

class HelloBlock extends BlockBase {

  // /**
  //  * {@inheritdoc}
  //  */
  // public function build() {
  //   return [
  //     '#markup' => $this->t('Hello, World! Block Type Description'),
  //   ];
  // }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'hello_block_name' => $this->t(''),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['hello_block_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => $this->configuration['hello_block_name'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    if ($form_state->getValue('hello_block_name') === 'John') {
      $form_state->setErrorByName('hello_block_name', $this->t('You can not say hello to John.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->configuration['hello_block_name'] = $values['hello_block_name'];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $name = $config['hello_block_name'] ?? $this->t('to no one');
    // return [
    //   '#theme' => 'hello_block',
    //   '#custom_data' => ['age' => '31', 'DOB' => '2 May 2000'],
    //   '#custom_string' => 'Hello Block! Im the user name ' . $this->configuration['hello_block_name'],
    // ];

    return [
      '#markup' => $this->t('Hello @name!', [
        '@name' => $name,
      ]),
    ];
  }

}
