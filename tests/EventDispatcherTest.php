<?php

/**
 * @file
 * Contains \Commercie\Tests\Payment\Bridge\Symfony\EventDispatcher\EventDispatcherTest.
 */

namespace Commercie\Tests\Payment\Bridge\Symfony\EventDispatcher;

use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanCapturePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanExecutePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanRefundPayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreCapturePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreExecutePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreRefundPayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\PaymentEvents;
use Commercie\Payment\Payment\PaymentInterface;
use Commercie\Payment\PaymentMethod\PaymentMethodInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @coversDefaultClass \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher
 */
class EventDispatcherTest extends \PHPUnit_Framework_TestCase {

  /**
   * The Symfony event dispatcher.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $symfonyEventDispatcher;

  /**
   * The subject under test.
   *
   * @var \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->symfonyEventDispatcher = $this->getMock(EventDispatcherInterface::class);

    $this->sut = new EventDispatcher($this->symfonyEventDispatcher);
  }

  /**
   * @covers ::__construct
   */
  public function testConstruct() {
    new EventDispatcher($this->symfonyEventDispatcher);
  }

  /**
   * @covers ::postPaymentStatusChange
   */
  public function testPostPaymentStatusChange() {
    $payment = $this->getMock(PaymentInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::POST_PAYMENT_STATUS_CHANGE, $this->isInstanceOf(PostPaymentStatusChange::class));

    $this->sut->postPaymentStatusChange($payment);
  }

  /**
   * Provides data to self::testCanExecutePayment(),
   * self::testCanCapturedPayment(), and self::testCanRefundPayment().
   */
  public function providerCanPerformPaymentMethodOperation()
  {
    return [
      [true],
      [false],
      [null],
    ];
  }

  /**
   * @covers ::canExecutePayment
   *
   * @dataProvider providerCanPerformPaymentMethodOperation
   */
  public function testCanExecutePayment($result) {
    $paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::CAN_EXECUTE_PAYMENT, $this->isInstanceOf(CanExecutePayment::class))
      ->willReturnCallback(function($eventName, CanExecutePayment $event) use ($result) {
        $event->addResult($result);
      });

    $this->assertSame($result, $this->sut->canExecutePayment($paymentMethod));
  }

  /**
   * @covers ::preExecutePayment
   *
   */
  public function testPreExecutePayment() {
    $paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::PRE_EXECUTE_PAYMENT, $this->isInstanceOf(PreExecutePayment::class));

    $this->sut->preExecutePayment($paymentMethod);
  }

  /**
   * @covers ::canCapturePayment
   *
   * @dataProvider providerCanPerformPaymentMethodOperation
   */
  public function testCanCapturePayment($result) {
    $paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::CAN_CAPTURE_PAYMENT, $this->isInstanceOf(CanCapturePayment::class))
      ->willReturnCallback(function($eventName, CanCapturePayment $event) use ($result) {
        $event->addResult($result);
      });

    $this->assertSame($result, $this->sut->canCapturePayment($paymentMethod));
  }

  /**
   * @covers ::preCapturePayment
   *
   */
  public function testPreCapturePayment() {
    $paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::PRE_CAPTURE_PAYMENT, $this->isInstanceOf(PreCapturePayment::class));

    $this->sut->preCapturePayment($paymentMethod);
  }

  /**
   * @covers ::canRefundPayment
   *
   * @dataProvider providerCanPerformPaymentMethodOperation
   */
  public function testCanRefundPayment($result) {
    $paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::CAN_REFUND_PAYMENT, $this->isInstanceOf(CanRefundPayment::class))
      ->willReturnCallback(function($eventName, CanRefundPayment $event) use ($result) {
        $event->addResult($result);
      });

    $this->assertSame($result, $this->sut->canRefundPayment($paymentMethod));
  }

  /**
   * @covers ::preRefundPayment
   *
   */
  public function testPreRefundPayment() {
    $paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->symfonyEventDispatcher->expects($this->once())
      ->method('dispatch')
      ->with(PaymentEvents::PRE_REFUND_PAYMENT, $this->isInstanceOf(PreRefundPayment::class));

    $this->sut->preRefundPayment($paymentMethod);
  }

}
