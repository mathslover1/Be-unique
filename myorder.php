<html>
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Be@Unique</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assetss/img/logo.png"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assetss/vendor/fonts/boxicons.css"/>
    <link rel="stylesheet" href="assetss/vendor/fonts/fontawesome.css"/>

    <!-- Select 2 Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="assetss/vendor/css/core.css" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="assetss/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="assetss/css/demo.css"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assetss/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>

    <link rel="stylesheet" href="assetss/vendor/libs/apex-charts/apex-charts.css"/>
    <link rel="stylesheet" href="assetss/css/custom.css"/>
    <style>
        .total{
            display: flex;
            justify-content: right;
        }
        .back-button {
            display: flex;
            justify-content: right;
            margin-top: 20px;
        }
    .table-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
    </head>
    <body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="table-wrapper">
                <div class="table-responsive text-nowrap">
                    <table class="table text-center"> 
                        <h1 style="text-align: center; padding:70px"> Your Order</h1>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product image</th>
                                <th>Product Quantity</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            $email=$_SESSION['email'];
                            $conn = mysqli_connect("localhost","root","",'be@unique');
                            $query = "SELECT * FROM `order`
                            LEFT JOIN `product` ON order.product_id = product.index WHERE email='$email'";
                            $result = mysqli_query($conn,$query);
                           
                            $total =0;
                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["watch_name"]; ?></td> 
                                        <td><img src="<?php echo "../admin panel/img/" . $row['img']; ?>" alt="" width="15%"></td>
                                        <td><?php echo $row["quantity"]; ?></td>
                                        
                                        <td><?php echo $row["total_amount"]; ?></td>
                                        <td><?php echo $row["Status"]; ?></td>
                                        <td>
                                        <a href='deleteorder.php?id=<?php echo $row["index1"]; ?>'>Delete</a>

                                        </td>
                                    </tr>
                                    <tr> <?Php
                                    
                                    $total = $total+$row["total_amount"]; 
                                   
                                    ?>
                                    </tr>
                                    
                                    <?php
                                }
                               
                            } else {
                                echo "<tr><td colspan='6'>No results found.</td></tr>";
                            }
                            ?>
                        </tbody>
                        
                    
                
                </div>
            </div>
            
        </div>
    </div>
    </body>
    </html>
  
				</tbody>
			</table>
            <div class="total">
            <label>Total:</label>
            <?php  echo $total; ?> </div>
			<a href="homeafterlogin.php" class="back-button">
                        <button class="add-to-cart ">
                            <span class="text">Back</span>
                        </button>
                    </a>
		</div>
	</div>
</div>
</section>



                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
</div>
    </body>
</html>