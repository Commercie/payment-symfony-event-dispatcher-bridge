<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher\Event;

use Commercie\Payment\PaymentMethod\PaymentMethodInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before a payment method operation.
 */
abstract class PrePaymentMethodOperation extends Event {

  /**
   * The payment method.
   *
   * @var \Commercie\Payment\PaymentMethod\PaymentMethodInterface
   */
  protected $paymentMethod;

  /**-
   * Constructs a new instance.
   *
   * @param \Commercie\Payment\PaymentMethod\PaymentMethodInterface $paymentMethod
   */
  public function __construct(PaymentMethodInterface $paymentMethod) {
    $this->paymentMethod = $paymentMethod;
  }

  /**
   * Gets the payment method that should execute the payment.
   *
   * @return \Commercie\Payment\PaymentMethod\PaymentMethodInterface
   */
  public function getPaymentMethod() {
    return $this->paymentMethod;
  }

}
