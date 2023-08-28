<?php

namespace Ttd\CodeTestability\ExtractMethod\After;

use Exception;
use Ttd\CodeTestability\Models\Order;
use Ttd\CodeTestability\Repositories\OrderRepository;
use Ttd\CodeTestability\Services\EmailService;

class OrderService {
    private $orderRepository;
    private $emailService;
    
    public function __construct(OrderRepository $orderRepository, EmailService $emailService) {
        $this->orderRepository = $orderRepository;
        $this->emailService = $emailService;
    }
    
    public function processOrder(Order $order) {
        // Business logic for processing the order
        // Step 1: Validate order
        if (!$this->validateOrder()) {
            throw new Exception("Invalid order");
        }

        // Step 2: Calculate order total
        $orderTotal = $this->calculateOrderTotal();

        // Step 3: Apply discounts
        $discountedTotal = $this->applyDiscounts($orderTotal);
        
        // Step 4: Place order and Save the order to the database
        $this->saveOrder($order, $discountedTotal);
        
        // Step 5: Send email notification to the customer
        $this->sendOrderConfirmationEmail($order);
        
        // More business logic for order processing
        // ...
    }

    private function validateOrder()
    {
        // Validation logic
    }

    private function calculateOrderTotal()
    {
        // Calculation logic
    }

    private function applyDiscounts($total)
    {
        // Discount logic
    }
    
    private function saveOrder(Order $order, $discountedTotal) {
        $this->orderRepository->save($order, $discountedTotal);
    }
    
    private function sendOrderConfirmationEmail(Order $order) {
        $this->emailService->sendEmail($order->getCustomerEmail(), 'Order Confirmation', 'Your order has been processed.');
    }
}