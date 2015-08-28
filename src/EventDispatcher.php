<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher;

use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanCapturePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanExecutePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\CanRefundPayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PostPaymentStatusChange;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreCapturePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreExecutePayment;
use Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreRefundPayment;
use Commercie\Payment\EventDispatcherInterface;
use Commercie\Payment\Payment\PaymentInterface;
use Commercie\Payment\PaymentMethod\PaymentMethodInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface as SymfonyEventDispatcherInterface;

/**
 * Dispatches Payment events through Symfony's event dispatcher.
 */
class EventDispatcher implements EventDispatcherInterface {

  /**
   * The Symfony event dispatcher.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $symfonyEventDispatcher;

  /**
   * Constructs a new instance.
   *
   * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $symfony_event_dispatcher
   */
  public function __construct(SymfonyEventDispatcherInterface $symfony_event_dispatcher) {
    $this->symfonyEventDispatcher = $symfony_event_dispatcher;
  }

  public function postPaymentStatusChange(PaymentInterface $payment) {
    $event = new PostPaymentStatusChange($payment);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::POST_PAYMENT_STATUS_CHANGE, $event);
  }

  public function canExecutePayment(PaymentMethodInterface $paymentMethod) {
    $event = new CanExecutePayment($paymentMethod);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::CAN_EXECUTE_PAYMENT, $event);

    return $event->getResult();
  }

  public function preExecutePayment(PaymentMethodInterface $paymentMethod) {
    $event = new PreExecutePayment($paymentMethod);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::PRE_EXECUTE_PAYMENT, $event);
  }

  public function canCapturePayment(PaymentMethodInterface $paymentMethod) {
    $event = new CanCapturePayment($paymentMethod);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::CAN_CAPTURE_PAYMENT, $event);

    return $event->getResult();
  }

  public function preCapturePayment(PaymentMethodInterface $paymentMethod) {
    $event = new PreCapturePayment($paymentMethod);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::PRE_CAPTURE_PAYMENT, $event);
  }

  public function canRefundPayment(PaymentMethodInterface $paymentMethod) {
    $event = new CanRefundPayment($paymentMethod);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::CAN_REFUND_PAYMENT, $event);

    return $event->getResult();
  }

  public function preRefundPayment(PaymentMethodInterface $paymentMethod) {
    $event = new PreRefundPayment($paymentMethod);
    $this->symfonyEventDispatcher->dispatch(PaymentEvents::PRE_REFUND_PAYMENT, $event);
  }

}
