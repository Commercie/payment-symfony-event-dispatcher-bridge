<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PrePaymentMethodOperation.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event;

use BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before a payment method operation.
 */
abstract class PrePaymentMethodOperation extends Event {

  /**
   * The payment method.
   *
   * @var \BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface
   */
  protected $paymentMethod;

  /**-
   * Constructs a new instance.
   *
   * @param \BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface $paymentMethod
   */
  public function __construct(PaymentMethodInterface $paymentMethod) {
    $this->paymentMethod = $paymentMethod;
  }

  /**
   * Gets the payment method that should execute the payment.
   *
   * @return \BartFeenstra\Payment\PaymentMethod\PaymentMethodInterface
   */
  public function getPaymentMethod() {
    return $this->paymentMethod;
  }

}
