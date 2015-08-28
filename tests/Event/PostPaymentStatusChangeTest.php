<?php

/**
 * @file
 * Contains \Commercie\Tests\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChangeTest.
 */

namespace Commercie\Tests\Payment\Bridge\Symfony\EventDispatcher;

use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange;
use Commercie\Payment\Payment\PaymentInterface;


/**
 * @coversDefaultClass \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange
 */
class PostPaymentStatusChangeTest extends \PHPUnit_Framework_TestCase {

  /**
   * The payment.
   *
   * @var \Commercie\Payment\Payment\PaymentInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $payment;

  /**
   * The subject under test.
   *
   * @var \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->payment = $this->getMock(PaymentInterface::class);

    $this->sut = new PostPaymentStatusChange($this->payment);
  }

  /**
   * @covers ::__construct
   * @covers ::getPayment
   */
  public function testGetPayment() {
    $this->assertSame($this->payment, $this->sut->getPayment());
  }

}
