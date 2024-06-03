<?php
include 'includes/dbcon.php';
include 'includes/session.php';
$statusMsg = '';

if (isset($_POST['update'])) {
  $ratings = $_POST['ratings'];
  $transactionId = $_POST['transactionId'];
  $query = "UPDATE tbltransaction SET ratings='$ratings' WHERE transactionId='$transactionId'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    $statusMsg = "<div class='alert alert-success' role='alert'>
    Successfully rated!
</div>";
  } else {
    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred!</div>";
  }
}
?>

<!doctype html>
<html lang="en">
<?php include "includes/head.php";?>

<body>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <div class="form-group row mb-3">
                      <label for="rating" class="col-lg-12 col-form-label">Rate</label>
                      <div class="col-lg-6 col-12">
                        <select name="ratings" id="rating" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="transactionId" readonly="true" class="form-control" id="transactionId" hidden>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="update" class="btn btn-primary">Rate</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="row">
          <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
            <div class="card mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">My Transactions</h6>
                <?php echo $statusMsg; ?>
              </div>
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>Service</th>
                      <th>Date Booked</th>
                      <th>Time</th>
                      <th>Branch</th>
                      <th>Transaction No</th>
                      <th>Status</th>
                   
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT t.*, s.serviceName, t.CustId
                              FROM tbltransaction t
                              INNER JOIN tblservices s ON t.serviceId = s.serviceId
                              
                              WHERE CustId = ".$_SESSION['ClientId'];

                    $rs = $conn->query($query);
                    $num = $rs->num_rows;
                    $sn = 0;
                    $status = "";

                    if ($num > 0) {
                      while ($rows = $rs->fetch_assoc()) {
                        $sn++;
                        echo "
                          <tr>
                            <td>{$sn}</td>
                            <td>{$rows['serviceName']}</td>
                            <td>{$rows['date_booked']}</td>
                            <td>{$rows['preferred_time']}</td>
                            <td>{$rows['branch']}</td>
                            <td>{$rows['transactionId']}</td>
                          
                            <td>{$rows['status']}</td>
                            <td>
                              <button type='button' href='?action=rate&id={$rows['transactionId']}' class='btn btn-success editbtn'>Rate</button>
                            </td>
                          </tr>";
                      }
                    } else {
                      echo "<div class='alert alert-danger' role='alert'>
                              No Transaction Record!
                            </div>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--Row-->

        <!-- Documentation Link -->
        <!-- <div class="row">
          <div class="col-lg-12 text-center">
            <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/" target="_blank">
                bootstrap forms documentations.</a> and <a href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input groups documentations</a></p>
          </div>
        </div> -->
      </div>
      <!---Container Fluid-->
    </div>
    <?php include "includes/footer.php";?>
    <!-- Footer -->
  </div>

  <!-- JAVASCRIPT FILES -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/click-scroll.js"></script>
  <script src="js/custom.js"></script>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script>
    $(document).ready(function () {
      $('.editbtn').on('click', function () {
        $('#editmodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();
        console.log(data);
        $('#transactionId').val(data[6]);
        $('#ratings').val(data[8]);
      });
    });
  </script>
</body>
</html>
