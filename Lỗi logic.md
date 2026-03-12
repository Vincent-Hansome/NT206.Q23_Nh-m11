---
title: Lỗi logic

---

# Lỗi Syntax
## 1. settings.php
Dòng 5
```php
'timezone' => 'Asia/Ho_Chi_Minh'   # Thiếu dấu ,
'language' => 'en',
```

## 2. reports.php
Dòng 15
```php
foreach ($totalsByCategory as $category => $total { # Thiếu )
```

## 3. customers.php
Dòng 3
```php
$activeCustomers = []   # Thiếu ;
```
## dashbroard.php
Dòng 13: Cộng dồn số lượng ($item['qty']) vào biến $totalRevenue. Doanh thu phải là số lượng × đơn giá.
# Lỗi Logic
## checkout.php
Dòng 15
```php
$discountValue = $subtotal * $discountPercent;
# fix
$discountValue = $subtotal * ($discountPercent / 100);
```
> Lỗi tính toán x10 thay vì x10%

Dòng 16
```php
$shippingFee = $subtotal >= 50 ? 5 : 0;
# Fix
$shippingFee = $subtotal >= 50 ? 0 : 5;
```
> Lỗi Shipping logic ngược

Dòng 17
```php
$vat = $subtotal * 0.1;
# Fix
$vat = ($subtotal - $discountValue) * 0.1;
```
> Lỗi tính toán VAT tính trên subtotal gốc thay vì sau discount

## orders.php
Dòng 6
```php
if ($order['status'] != 'completed') {
# Fix
if ($order['status'] === 'pending') {
```

## dashbroard
Dòng 19: Điều kiện của if ($product['stock'] > 5). Nghĩa là những sản phẩm còn nhiều hơn 5 món mới được cho vào danh sách "Low stock" (Sắp hết). Đúng là phải ít hơn 5
