<?php

/**
 * @file
 * Contains \BartFeenstra\Tests\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChangeTest.
 */

namespace BartFeenstra\Tests\Payment\Bridge\Symfony\EventDispatcher;

use BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange;
use BartFeenstra\Payment\Payment\PaymentInterface;


/**
 * @coversDefaultClass \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange
 */
class PostPaymentStatusChangeTest extends \PHPUnit_Framework_TestCase {

  /**
   * The payment.
   *
   * @var \BartFeenstra\Payment\Payment\PaymentInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $payment;

  /**
   * The subject under test.
   *
   * @var \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange
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
