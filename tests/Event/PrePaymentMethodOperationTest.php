<?php

/**
 * @file
 * Contains \BartFeenstra\Tests\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperationTest.
 */

namespace BartFeenstra\Tests\Payment\Bridge\Symfony\EventDispatcher;

use BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation;
use BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface;


/**
 * @coversDefaultClass \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation
 */
class PrePaymentMethodOperationTest extends \PHPUnit_Framework_TestCase {

  /**
   * The payment method.
   *
   * @var \BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $paymentMethod;

  /**
   * The subject under test.
   *
   * @var \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->sut = $this->getMockBuilder(PrePaymentMethodOperation::class)
      ->setConstructorArgs([$this->paymentMethod])
      ->getMockForAbstractClass();
  }

  /**
   * @covers ::__construct
   * @covers ::getPaymentMethod
   */
  public function testGetPaymentMethod() {
    $this->assertSame($this->paymentMethod, $this->sut->getPaymentMethod());
  }

}
