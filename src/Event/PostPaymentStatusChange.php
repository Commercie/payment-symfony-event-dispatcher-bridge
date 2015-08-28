<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher\Event;

use Commercie\Payment\Payment\PaymentInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Provides an event that is dispatched after a payment's status has changed.
 *
 * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::POST_PAYMENT_STATUS_CHANGE
 */
class PostPaymentStatusChange extends Event {

  /**
   * The payment.
   *
   * @var \Commercie\Payment\Payment\PaymentInterface
   */
  protected $payment;

  /**-
   * Constructs a new instance.
   *
   * @param \Commercie\Payment\Payment\PaymentInterface $payment
   *   The payment the status was changed for.
   */
  public function __construct(PaymentInterface $payment) {
    $this->payment = $payment;
  }

  /**
   * Gets the payment the status was changed for.
   *
   * @return \Commercie\Payment\Payment\PaymentInterface
   */
  public function getPayment() {
    return $this->payment;
  }

}
