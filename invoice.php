<?php
include 'header.php';
include("./db-connection/db connection.php");
?>
<?php
$order_child_order_master_id = $_GET['order_child_order_master_id'];
$query = "SELECT * FROM `tbl_order_master` INNER JOIN tbl_customer ON tbl_customer.customer_id = tbl_order_master.order_master_customer_id WHERE tbl_order_master.order_master_id = $order_child_order_master_id";
$result = mysqli_query($conn, $query);
($row = mysqli_fetch_array($result))
    ?>

<div id="print" style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 40px;">
    <div
        style="max-width: 800px; margin: auto; background-color: #fff; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); padding: 40px;">

        <div
            style="border-bottom: 2px solid #eee; margin-bottom: 30px; padding-bottom: 20px; display: flex; justify-content: space-between;">
            <div>
                <h2 style="color: #007bff; margin: 0 0 10px 0;">SWIFTBASKET</h2>
                <p style="margin: 0;">MIDC Baramati - 413102</p>
                <p style="margin: 0;">Email: swiftbasket@121gmail.com</p>
                <p style="margin: 0;">Phone: 2222-444-666</p>
            </div>
            <div style="text-align: right;">
                <h3 style="margin: 0; color: #333;">INVOICE</h3>
                <p style="margin: 5px 0;">Invoice #: <strong><?= $row["order_master_id"] ?></strong></p>
                <p style="margin: 0;">Date: <strong><?= $row["date"] ?></strong></p>
            </div>
        </div>


        <div style="margin-bottom: 30px;">
            <h4 style="color: #666; margin-bottom: 5px;">Bill To:</h4>
            <p style="margin: 0; font-weight: bold;"><?= $row["customer_name"] ?></p>
            <p style="margin: 0;"><?= $row["customer_email"] ?></p>
        </div>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
            <thead style="background-color: #343a40; color: #fff;">
                <tr>
                    <th style="padding: 10px; text-align: left;">#</th>
                    <th style="padding: 10px; text-align: left;">Item</th>
                    <th style="padding: 10px;">Qty</th>
                    <th style="padding: 10px;">Unit Price</th>
                    <th style="padding: 10px; text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $subtotal = 0;
                $customer_id = $_GET['order_child_customer_id'];
                $order_child_order_master_id = $_GET['order_child_order_master_id'];
                $query2 = "SELECT * FROM tbl_order_master_child INNER JOIN tbl_product ON tbl_order_master_child.order_child_product_id = tbl_product.product_id WHERE tbl_order_master_child.order_child_customer_id = $customer_id AND tbl_order_master_child.order_child_order_master_id	 = $order_child_order_master_id";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    $subtotal += $row["order_child_total_price"];
                    ?>
                    <tr style="background-color: #f1f1f1;">
                        <td style="padding: 10px;"><?= ++$count; ?></td>
                        <td style="padding: 10px;"><?= $row["product_name"] ?></td>
                        <td style="padding: 10px; text-align: center;"><?= $row["order_child_qty"] ?></td>
                        <td style="padding: 10px; text-align: center;"><?= $row["product_sell_price"] ?></td>
                        <td style="padding: 10px; text-align: right;"><?= $row["order_child_total_price"] ?></td>
                    </tr>
                    <?php
                } ?>
            </tbody>
            <tfoot>
                <?php
                $shipping = 10;
                $total = $subtotal;
                ?>
                <tr>
                    <td colspan="4" style="text-align: right; padding: 10px; font-weight: bold;">Subtotal</td>
                    <td style="text-align: right; padding: 10px;"><?= $subtotal ?> ₹</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right; padding: 10px; font-weight: bold;">Shipping</td>
                    <td style="text-align: right; padding: 10px;">10 ₹</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right; padding: 10px; font-weight: bold;">Total</td>
                    <td style="text-align: right; padding: 10px; color: green; font-weight: bold;"><?= $total ?> ₹</td>
                </tr>
            </tfoot>
        </table>

        <div style="margin-bottom: 30px;">
            <h4 style="color: #666;">Notes:</h4>
            <p style="color: #777;">Please make the payment by the due date. Thank you for doing business with us!</p>
        </div>

        <div style="text-align: right;" id="printBtn">
            <button onclick="printtable()"
                style="padding: 10px 20px; border: 2px solid #007bff; background-color: white; color: #007bff; border-radius: 6px; font-size: 16px; cursor: pointer;">
                🖨️ Print Invoice
            </button>
        </div>
    </div>
</div>
<script>
    function printtable() {
        document.getElementById("printBtn").style.display = "none";
        var printcontent = document.getElementById("print").innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        window.location.reload();
    }
</script>

<?php include 'footer.php'; ?>