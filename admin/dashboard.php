<?php require_once 'inc/header.php'; ?>
<?php
if (!isset($_SESSION['ADMIN'])) {
    header("location: index.php");
}

$total_order = total_order();
// $total_order_amount = total_order_amount();
// $total_orders_with_status_1 = total_orders_with_status_1();
$total_customer = total_user_registers();
$total_product = total_product();
?>
<?php require_once 'inc/nav.php'; ?>

<main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Dashboard</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
       <!-- col-6 -->
       <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
          <div class="info">
            <h4>Total customers</h4>
            <p><b><?php echo $total_customer; ?> customers</b></p>
            <p class="info-tong">Total number of managed customers.</p>
          </div>
        </div>
      </div>
       <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Gross Product</h4>
                <p><b><?php echo $total_product; ?> products</b></p>
                <p class="info-tong">Total number of products managed.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Total order</h4>
                <p><b><?php echo $total_order; ?> orders</b></p>
                <p class="info-tong">Total number of sales invoices for the month.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
              <div class="info">
                <h4>Almost out of stock</h4>
                <p><b>
                  <!-- 4 products -->
                </b></p>
                <p class="info-tong">The warning number of products is out of stock and needs to be added.</p>
              </div>
            </div>
          </div>
           <!-- col-12 -->
           <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Order status</h3>
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Order's ID</th>
                      <th>Customer's Name</th>
                      <th>Total amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AL3947</td>
                      <td>Lana Del Rey</td>
                      <td>
                        385.93 $
                      </td>
                      <td><span class="badge bg-info">Waiting for progressing</span></td>
                    </tr>
                    <tr>
                      <td>ER3835</td>
                      <td>Andrea Bocelli </td>
                      <td>
                        539.87 $
                      </td>
                      <td><span class="badge bg-warning">Being transported</span></td>
                    </tr>
                    <tr>
                      <td>MD0837</td>
                      <td>Ed Sheeran</td>
                      <td>
                        496.7 $
                      </td>
                      <td><span class="badge bg-success">Done</span></td>
                    </tr>
                    <tr>
                      <td>MT9835</td>
                      <td>Robbie Williams 	</td>
                      <td>
                        879.65 $
                      </td>
                      <td><span class="badge bg-danger">Cancelled	</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- / div trống-->
            </div>
           </div>
            <!-- / col-12 -->
             <!-- col-12 -->
            <div class="col-md-12">
                <div class="tile">
                  <h3 class="tile-title">New Customer</h3>
                <div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Customer's Name</th>
                        <th>Date of Birth</th>
                        <th>Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>#183</td>
                        <td>Dua Lipa</td>
                        <td>21/7/1992</td>
                        <td><span class="tag tag-success">0921387221</span></td>
                      </tr>
                      <tr>
                        <td>#219</td>
                        <td>David Guetta</td>
                        <td>30/4/1975</td>
                        <td><span class="tag tag-warning">0912376352</span></td>
                      </tr>
                      <tr>
                        <td>#627</td>
                        <td>Stromae</td>
                        <td>12/3/1999</td>
                        <td><span class="tag tag-primary">01287326654</span></td>
                      </tr>
                      <tr>
                        <td>#175</td>
                        <td>Dua Lipa</td>
                        <td>4/12/20000</td>
                        <td><span class="tag tag-danger">0912376763</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
             <!-- / col-12 -->
        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">6 Months of Input Data</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">6-month revenue statistics</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!--END right-->
    </div>


  </main>

<?php require_once 'inc/footer.php'; ?>