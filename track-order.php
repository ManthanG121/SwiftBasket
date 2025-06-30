<?php
if (!isset($_SESSION["login"])) {
    echo "<script> window.location.href='SignUp_LogIn_Form.php'</script>";
    exit;
}
include "header.php";
include("./db-connection/db connection.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --primary: #28a745;
        --primary-hover: #218838;
        --secondary: #ffc107;
        --dark: #343a40;
        --light: #f8f9fa;
        --gray: #6c757d;
        --light-gray: #e9ecef;
    }
    
    .order-history-container {
        background-color: #f8f9fa;
        min-height: 100vh;
    }
    
    .order-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 1.5rem;
    }
    
    .order-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .order-card-header {
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 10px 10px 0 0 !important;
        padding: 1rem 1.5rem;
    }
    
    .order-status-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.35rem 0.65rem;
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
    
    .order-table {
        margin-bottom: 0;
    }
    
    .order-table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
        border-top: none;
    }
    
    .order-table td {
        vertical-align: middle;
    }
    
    .action-btn {
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
        border-radius: 50px;
        font-weight: 500;
    }
    
    .empty-state {
        padding: 3rem;
        text-align: center;
    }
    
    .empty-state-icon {
        font-size: 3rem;
        color: #adb5bd;
        margin-bottom: 1rem;
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
        background-color: #e9ecef;
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
    
    @media (max-width: 767.98px) {
        .order-table thead {
            display: none;
        }
        
        .order-table tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
        }
        
        .order-table td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: none;
            border-bottom: 1px solid #dee2e6;
        }
        
        .order-table td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #495057;
            margin-right: 1rem;
        }
        
        .order-table td:last-child {
            border-bottom: none;
        }
    }
</style>

<div class="order-history-container py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold mb-3">My Orders</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order History</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card order-card">
                    <div class="order-card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">Order Summary</h5>
                        
                    </div>
                    
                    <div class="card-body p-0">
                        <?php
                        $count = 1;
                        $customer_id = $_SESSION['customer_id'];
                        $query = "SELECT * FROM tbl_order_master WHERE tbl_order_master.order_master_customer_id = $customer_id";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="table-responsive">
                            <table class="table order-table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($result)) { 
                                        $status_class = '';
                                        switch(strtolower($row['order_master_status'])) {
                                            case 'completed': $status_class = 'status-completed'; break;
                                            case 'cancelled': $status_class = 'status-cancelled'; break;
                                            case 'processing': $status_class = 'status-processing'; break;
                                            default: $status_class = 'status-pending';
                                        }
                                    ?>
                                    <tr>
                                        <td data-label="Order #"><?= $count++ ?></td>
                                        <td data-label="Date"><?= date('M d, Y', strtotime($row['date'])) ?></td>
                                        <td data-label="Total">₹<?= number_format($row['order_master_total'], 2) ?></td>
                                        <td data-label="Payment">
                                            <span class="badge bg-<?= $row['order_master_payment_status'] == 'Paid' ? 'success' : 'warning' ?>">
                                                <?= $row['order_master_payment_status'] ?>
                                            </span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="order-status-badge <?= $status_class ?>">
                                                <?= $row['order_master_status'] ?>
                                            </span>
                                        </td>
                                        <td data-label="Actions" class="text-center">
                                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                                <a href="product-view-list.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
                                                    class="btn btn-sm btn-outline-primary action-btn">
                                                    <i class="fas fa-eye me-1"></i>View
                                                </a>
                                                <?php if(strtolower($row['order_master_status']) != 'cancelled' && strtolower($row['order_master_status']) != 'completed') { ?>
                                                <a href="cancle_order.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
                                                    class="btn btn-sm btn-outline-danger action-btn"
                                                    onclick="return confirm('Are you sure you want to cancel this order?');">
                                                    <i class="fas fa-times me-1"></i>Cancel
                                                </a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                        <div class="empty-state py-5">
                            <div class="empty-state-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <h4 class="mb-3">No Orders Found</h4>
                            <p class="text-muted mb-4">You haven't placed any orders yet.</p>
                            <a href="shop.php" class="btn btn-primary">Start Shopping</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add responsive behavior for tables
    document.addEventListener('DOMContentLoaded', function() {
        const tables = document.querySelectorAll('.order-table');
        
        tables.forEach(table => {
            const ths = table.querySelectorAll('thead th');
            const tds = table.querySelectorAll('tbody td');
            
            tds.forEach((td, index) => {
                const label = ths[index % ths.length].textContent;
                td.setAttribute('data-label', label);
            });
        });
    });
</script>

<?php
include "footer.php";
?>