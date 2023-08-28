<?php
namespace Ttd\CodeTestability\ExtractMethod\Before;

use Ttd\CodeTestability\Models\Order;
use Ttd\CodeTestability\Repositories\OrderRepository;
use Ttd\CodeTestability\Services\EmailService;

class OrderService {
    private $orderRepository;
    private $emailService;
    
    public function __construct() {
        $this->orderRepository = new OrderRepository();
        $this->emailService = new EmailService();
    }
    
    public function processOrder(Order $order) {
    
        // Business logic for processing the order
        
        // Step 1: Validate order
        // Step 2: Calculate order total
        // Step 3: Apply discounts
        // Step 4: Place order and Save the order to the database
        $this->orderRepository->save($order);
        
        // Step 5: Send email notification to the customer
        $this->emailService->sendEmail($order->getCustomerEmail(), 'Order Confirmation', 'Your order has been processed.');
        
        // More business logic for order processing
        // ...
    }
}