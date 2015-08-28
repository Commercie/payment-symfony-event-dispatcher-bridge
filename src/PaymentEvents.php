<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\PaymentEvents.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher;

/**
 * Defines Payment events.
 */
final class PaymentEvents {

  /**
   * The name of the event that is fired after a new payment status is set.
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentStatusSet
   */
  const POST_PAYMENT_STATUS_CHANGE = 'commercie/payment-symfony-event-dispatcher-bridge.payment_status_set';

  /**
   * The name of the event that is fired during a check whether a payment method
   * can execute a payment
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanExecutePayment
   */
  const CAN_EXECUTE_PAYMENT = 'commercie/payment-symfony-event-dispatcher-bridge.can_execute_payment';

  /**
   * The name of the event that is fired before a payment is executed.
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentPreExecute
   */
  const PRE_EXECUTE_PAYMENT = 'commercie/payment-symfony-event-dispatcher-bridge.pre_execute_payment';

  /**
   * The name of the event that is fired during a check whether a payment method
   * can capture a payment
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanCapturePayment
   */
  const CAN_CAPTURE_PAYMENT = 'commercie/payment-symfony-event-dispatcher-bridge.can_capture_payment';

  /**
   * The name of the event that is fired before a payment is captured.
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentPreCapture
   */
  const PRE_CAPTURE_PAYMENT = 'commercie/payment-symfony-event-dispatcher-bridge.pre_capture_payment';

  /**
   * The name of the event that is fired during a check whether a payment method
   * can refund a payment
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanRefundPayment
   */
  const CAN_REFUND_PAYMENT = 'commercie/payment-symfony-event-dispatcher-bridge.can_refund_payment';

  /**
   * The name of the event that is fired before a payment is refunded.
   *
   * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PaymentPreRefund
   */
  const PRE_REFUND_PAYMENT = 'commercie/payment-symfony-event-dispatcher-bridge.pre_refund_payment';

}
