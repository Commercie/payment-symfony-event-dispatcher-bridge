<?php

/**
 * @file
 * Contains \Commercie\Tests\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperationTest.
 */

namespace Commercie\Tests\Payment\Bridge\Symfony\EventDispatcher;

use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation;
use Commercie\Payment\PaymentMethod\PaymentMethodInterface;


/**
 * @coversDefaultClass \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation
 */
class PrePaymentMethodOperationTest extends \PHPUnit_Framework_TestCase {

  /**
   * The payment method.
   *
   * @var \Commercie\Payment\PaymentMethod\PaymentMethodInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $paymentMethod;

  /**
   * The subject under test.
   *
   * @var \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation
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
