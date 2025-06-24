<?php
include "header.php";
include("./db-connection/db connection.php");

$customer_id = $_GET['order_master_customer_id'];
$order_master_id = $_GET['order_master_id'];
$query = "SELECT * FROM tbl_order_master WHERE order_master_id = $order_master_id AND order_master_customer_id = $customer_id";
$order_result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($order_result);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --primary: #28a745;
        --primary-light: rgba(40, 167, 69, 0.1);
        --secondary: #ffc107;
        --dark: #343a40;
        --light: #f8f9fa;
        --gray: #6c757d;
        --light-gray: #e9ecef;
    }
    
    .order-details-container {
        background-color: #f8f9fa;
        min-height: 100vh;
        padding: 2rem 0;
    }
    
    .order-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .order-header {
        background-color: white;
        padding: 1.5rem;
        border-bottom: 1px solid var(--light-gray);
    }
    
    .order-status-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
    }
    
    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }
    
    .status-completed {
        background-color: #d4edda;
        color: #155724;
    }
    
    .status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .status-processing {
        background-color: #cce5ff;
        color: #004085;
    }
    
    .product-table {
        margin-bottom: 0;
    }
    
    .product-table th {
        background-color: var(--light);
        font-weight: 600;
        color: var(--dark);
    }
    
    .product-img {
        width: 80px;
        height: 80px;
        object-fit: contain;
        border-radius: 5px;
        border: 1px solid var(--light-gray);
    }
    
    .timeline {
        position: relative;
        padding-left: 3rem;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 1.5rem;
        top: 0;
        bottom: 0;
        width: 2px;
        background-color: var(--light-gray);
    }
    
    .timeline-item {
        position: relative;
        padding-bottom: 2rem;
    }
    
    .timeline-item:last-child {
        padding-bottom: 0;
    }
    
    .timeline-dot {
        position: absolute;
        left: -3rem;
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background-color: var(--primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
    }
    
    .timeline-content {
        background-color: white;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    
    .progress-steps {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin: 2rem 0;
    }
    
    .progress-steps::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 4px;
        background-color: var(--light-gray);
        transform: translateY(-50%);
        z-index: 1;
    }
    
    .progress-bar {
        position: absolute;
        top: 50%;
        left: 0;
        height: 4px;
        background-color: var(--primary);
        transform: translateY(-50%);
        z-index: 2;
        transition: width 0.3s ease;
    }
    
    .step {
        position: relative;
        z-index: 3;
        text-align: center;
        flex: 1;
    }
    
    .step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--light-gray);
        color: var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.5rem;
        font-weight: 600;
        border: 3px solid white;
    }
    
    .step.active .step-circle {
        background-color: var(--primary);
        color: white;
    }
    
    .step.completed .step-circle {
        background-color: var(--primary);
        color: white;
    }
    
    .step-label {
        font-size: 0.85rem;
        font-weight: 500;
        color: var(--gray);
    }
    
    .step.active .step-label,
    .step.completed .step-label {
        color: var(--dark);
        font-weight: 600;
    }
    
    .summary-card {
        background-color: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    
    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid var(--light-gray);
    }
    
    .summary-row:last-child {
        border-bottom: none;
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    @media (max-width: 767.98px) {
        .progress-steps {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
        }
        
        .progress-steps::before,
        .progress-bar {
            display: none;
        }
        
        .step {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-align: left;
            width: 100%;
        }
        
        .step-circle {
            margin: 0;
            flex-shrink: 0;
        }
    }
</style>

<div class="order-details-container">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="order-history.php">My Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order #<?= $order_master_id ?></li>
                    </ol>
                </nav>
                <h2 class="fw-bold mb-3">Order Details</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="order-card p-3">
                    <div class="order-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="mb-3 mb-md-0">
                            <h5 class="fw-bold mb-2">Order #<?= $order_master_id ?></h5>
                            <div class="d-flex align-items-center gap-2">
                                <span class="order-status-badge status-<?= strtolower($order['order_master_status']) ?>">
                                    <?= $order['order_master_status'] ?>
                                </span>
                                <span class="text-muted">Orderd On <?= date('M d, Y', strtotime($order['date'])) ?></span>
                            </div>
                        </div>
                        <a href="invoice.php?order_child_customer_id=<?= $customer_id ?>&order_child_order_master_id=<?= $order_master_id ?>"
                            class="btn btn-outline-primary">
                            <i class="fas fa-file-invoice me-2"></i>View Invoice
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Order Items</h6>
                        <div class="table-responsive">
                            <table class="table product-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query2 = "SELECT * FROM tbl_order_master_child 
                                              INNER JOIN tbl_product ON tbl_order_master_child.order_child_product_id = tbl_product.product_id 
                                              WHERE tbl_order_master_child.order_child_customer_id = $customer_id 
                                              AND tbl_order_master_child.order_child_order_master_id = $order_master_id";
                                    $result = mysqli_query($conn, $query2);
                                    $subtotal = 0;
                                    
                                    while ($row = mysqli_fetch_array($result)) {
                                        $lineTotal = $row['order_child_qty'] * $row['product_sell_price'];
                                        $subtotal += $lineTotal;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="product-img me-3" alt="<?= $row['product_name'] ?>">
                                                <div>
                                                    <h6 class="mb-1"><?= $row['product_name'] ?></h6>
                                                    <small class="text-muted">SKU: <?= $row['product_id'] ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>₹<?= number_format($row['product_sell_price'], 2) ?></td>
                                        <td><?= $row['order_child_qty'] ?></td>
                                        <td>₹<?= number_format($lineTotal, 2) ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            <h6 class="fw-bold mb-3">Order Progress</h6>
                            <div class="progress-steps">
                                <div class="progress-bar" style="width: 50%;"></div>
                                <div class="step completed">
                                    <div class="step-circle">1</div>
                                    <div class="step-label">Ordered</div>
                                </div>
                                <div class="step completed">
                                    <div class="step-circle">2</div>
                                    <div class="step-label">Shipped</div>
                                </div>
                                <div class="step active">
                                    <div class="step-circle">3</div>
                                    <div class="step-label">Out for Delivery</div>
                                </div>
                                <div class="step">
                                    <div class="step-circle">4</div>
                                    <div class="step-label">Delivered</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="summary-card mb-4">
                    <h5 class="fw-bold mb-3">Order Summary</h5>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>₹<?= number_format($subtotal, 2) ?></span>
                    </div> 
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span class="text-success"><b>Free</b></span>
                    </div>
                    <div class="summary-row">
                        <span>Discount</span>
                        <span>-₹0.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Total</span>
                        <span>₹<?= number_format($order['order_master_total'], 2) ?></span>
                    </div>
                </div>
                
                <div class="summary-card">
                    <h5 class="fw-bold mb-3">Shipping Information</h5>
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">Shipping Address</h6>
                        <p class="mb-0">
                            Anand Gold Coin <br>
                            123 Main Street<br>
                            Baramati, Pune 413102<br>
                            Maharashtra, India
                        </p>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Payment Method</h6>
                        <p class="mb-0">
                            <i class="fas fa-credit-card me-2"></i>
                            <?= $order['order_master_payment_status'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include "footer.php";
?>