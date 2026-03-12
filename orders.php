foreach ($orders as $order) {
    if ($order['status'] === 'completed') {
        $completedOrders++;
    }

    foreach ($order['items'] as $item) {
        $totalRevenue += $item['qty'] * $item['price'];
    }
}

$lowStockItems = [];

foreach ($products as $sku => $product) {
    if ($product['stock'] <= 5) {
        $lowStockItems[] = $sku . ' - ' . $product['name'];
    }
}
<section class="card">
    <h3>Pending orders</h3>
    <p class="muted">Only pending items should be listed, newest first.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendingOnly as $order): ?>
                <tr>
                    <td>#<?php echo $order['id']; ?></td>
                    <td><?php echo htmlspecialchars($order['customer']); ?></td>
                    <td><?php echo htmlspecialchars(strtoupper($order['status'])); ?></td>
                    <td>$<?php echo number_format(calculate_order_total($order, $products), 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>