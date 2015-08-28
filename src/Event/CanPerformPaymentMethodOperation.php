<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanPerformPaymentMethodOperation.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher\Event;

use Commercie\Payment\PaymentMethod\PaymentMethodInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Provides an event that is dispatched during a check to perform a payment
 * method operation.
 */
abstract class CanPerformPaymentMethodOperation extends Event {

  /**
   * The results.
   *
   * @var bool[]|null{}
   */
  protected $results = [];

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
   * Aggregates a list of ternary values.
   *
   * @param bool[]|null[] $values
   *
   * @return bool|null
   */
  protected function aggregateTernaryValues(array $values)
  {
    if (in_array(false, $values, true)) {
      return false;
    } elseif (in_array(true, $values, true)) {
      return true;
    } else {
      return null;
    }
  }

  /**
   * Gets the payment method that should execute the payment.
   *
   * @return \Commercie\Payment\PaymentMethod\PaymentMethodInterface
   */
  public function getPaymentMethod() {
    return $this->paymentMethod;
  }

  /**
   * Gets the result.
   *
   * @return bool|null
   *   TRUE or FALSE if the operation can or cannot be performed. NULL if
   *   unsure.
   */
  public function getResult() {
    return $this->aggregateTernaryValues($this->results);
  }

  /**
   * Adds a result.
   *
   * @return bool|null
   *   TRUE or FALSE if the operation can or cannot be performed. NULL if
   *   unsure.
   *
   * @return $this
   */
  public function addResult($result) {
    $this->results[] = $result;

    return $this;
  }

}
