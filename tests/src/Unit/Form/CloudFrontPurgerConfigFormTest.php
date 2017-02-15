<?php

namespace Drupal\Tests\cloudfront_purger\Unit\Form;

use Drupal\cloudfront_purger\Form\CloudFrontPurgerConfigForm;
use Drupal\Core\Form\FormState;
use Drupal\Tests\UnitTestCase;

/**
 * Tests for CloudFrontInvalidator,.
 *
 * @coversDefaultClass \Drupal\cloudfront_purger\CloudFrontInvalidator
 * @group cloudfront_purger
 */
class CloudFrontPurgerConfigFormTest extends UnitTestCase {

  /**
   * Tests form submission sets correct config values.
   */
  public function testFormSubmit() {

    /** @var \PHPUnit_Framework_MockObject_MockObject|\Drupal\Core\Config\ConfigFactoryInterface $configFactory */
    $configFactory = $this->getConfigFactoryStub([
      'cloudfront_purger.settings' => [
        'distribution_id' => 'wizzbanger',
      ],
    ]);
    /** @var \PHPUnit_Framework_MockObject_MockObject|\Drupal\Core\Config\Config $config */
    $config = $configFactory->getEditable('cloudfront_purger.settings');
    $config->expects($this->once())
      ->method('set')
      ->with($this->equalTo('distribution_id'), $this->equalTo('foobarbaz'))
      ->willReturn($config);

    $configForm = new CloudFrontPurgerConfigForm($configFactory);

    $form = [];
    $form_state = (new FormState())
      ->setValues([
        'distribution_id' => 'foobarbaz',
      ]);

    $configForm->submitFormSuccess($form, $form_state);

  }

}
