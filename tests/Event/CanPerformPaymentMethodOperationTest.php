<?php

/**
 * @file
 * Contains \BartFeenstra\Tests\Payment\Bridge\Symfony\EventDispatcher\Event\CanPerformPaymentMethodOperationTest.
 */

namespace BartFeenstra\Tests\Payment\Bridge\Symfony\EventDispatcher;

use BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanPerformPaymentMethodOperation;
use BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface;


/**
 * @coversDefaultClass \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanPerformPaymentMethodOperation
 */
class CanPerformPaymentMethodOperationTest extends \PHPUnit_Framework_TestCase {

  /**
   * The payment method.
   *
   * @var \BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $paymentMethod;

  /**
   * The subject under test.
   *
   * @var \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanPerformPaymentMethodOperation
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->paymentMethod = $this->getMock(PaymentMethodInterface::class);

    $this->sut = $this->getMockBuilder(CanPerformPaymentMethodOperation::class)
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

  /**
   * @covers ::addResult
   * @covers ::getResult
   * @covers ::aggregateTernaryValues
   *
   * @dataProvider providerTestGetResult
   */
  public function testGetResult($expected, $resultA, $resultB) {
    $this->assertSame($this->sut, $this->sut->addResult($resultA));
    $this->sut->addResult($resultB);
    $this->assertSame($expected, $this->sut->getResult());
  }

  /**
   * Provides data to self::testGetResult().
   */
  public function providerTestGetResult()
  {
    return [
      [true, true, true],
      [true, true, null],
      [true, null, true],
      [null, null, null],
      [false, null, false],
      [false, false, true],
      [false, false, null],
      [false, false, false],
    ];
  }

}
