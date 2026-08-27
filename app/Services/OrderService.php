<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    /**
     * Update status of an order and handle associated side effects
     *
     * @param int $orderId
     * @param string $status
     * @param int|null $adminId
     * @return Order
     */
    public function updateOrderStatus(int $orderId, string $status, ?int $adminId = null): Order
    {
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        
        if ($status === 'Completed') {
            $order->completeDate = now()->toDateString();
        }

        if ($adminId) {
            $order->admin_id = $adminId;
        }

        $order->save();

        Log::info("Order #{$orderId} status updated to '{$status}' by admin ID: " . ($adminId ?? 'system'));

        return $order;
    }

    /**
     * Calculate order totals based on items and delivery charge
     *
     * @param array $items
     * @param float $deliveryCharge
     * @param float $discount
     * @return array
     */
    public function calculateOrderTotals(array $items, float $deliveryCharge = 0.0, float $discount = 0.0): array
    {
        $subtotal = 0.0;

        foreach ($items as $item) {
            $price = floatval($item['productPrice'] ?? $item['price'] ?? 0);
            $qty = intval($item['productQuantity'] ?? $item['quantity'] ?? 1);
            $subtotal += ($price * $qty);
        }

        $total = ($subtotal + $deliveryCharge) - $discount;

        return [
            'subtotal' => $subtotal,
            'delivery_charge' => $deliveryCharge,
            'discount' => $discount,
            'total' => max(0, $total),
        ];
    }

    /**
     * Get order details with customer and product information
     *
     * @param int $orderId
     * @return object|null
     */
    public function getOrderDetails(int $orderId): ?object
    {
        return DB::table('orders')
            ->select('orders.*', 'customers.customerName', 'customers.customerPhone', 'customers.customerAddress', 'couriers.courierName', 'cities.cityName', 'zones.zoneName', 'admins.name as adminName')
            ->leftJoin('customers', 'orders.id', '=', 'customers.order_id')
            ->leftJoin('couriers', 'orders.courier_id', '=', 'couriers.id')
            ->leftJoin('cities', 'orders.city_id', '=', 'cities.id')
            ->leftJoin('zones', 'orders.zone_id', '=', 'zones.id')
            ->leftJoin('admins', 'orders.admin_id', '=', 'admins.id')
            ->where('orders.id', '=', $orderId)
            ->first();
    }
}
