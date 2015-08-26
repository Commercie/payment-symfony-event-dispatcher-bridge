<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\PaymentEvents.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\EventDispatcher;

/**
 * Defines Payment events.
 */
final class PaymentEvents {

  /**
   * The name of the event that is fired after a new payment status is set.
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentStatusSet
   */
  const POST_PAYMENT_STATUS_CHANGE = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.payment_status_set';

  /**
   * The name of the event that is fired during a check whether a payment method
   * can execute a payment
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanExecutePayment
   */
  const CAN_EXECUTE_PAYMENT = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.can_execute_payment';

  /**
   * The name of the event that is fired before a payment is executed.
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentPreExecute
   */
  const PRE_EXECUTE_PAYMENT = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.pre_execute_payment';

  /**
   * The name of the event that is fired during a check whether a payment method
   * can capture a payment
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanCapturePayment
   */
  const CAN_CAPTURE_PAYMENT = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.can_capture_payment';

  /**
   * The name of the event that is fired before a payment is captured.
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentPreCapture
   */
  const PRE_CAPTURE_PAYMENT = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.pre_capture_payment';

  /**
   * The name of the event that is fired during a check whether a payment method
   * can refund a payment
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanRefundPayment
   */
  const CAN_REFUND_PAYMENT = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.can_refund_payment';

  /**
   * The name of the event that is fired before a payment is refunded.
   *
   * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentPreRefund
   */
  const PRE_REFUND_PAYMENT = 'bartfeenstra/payment-symfony-event-dispatcher-bridge.pre_refund_payment';

}
