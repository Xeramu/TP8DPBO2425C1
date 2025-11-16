<?php
require_once "config/config.php";// koneksi

$db = new config();
$conn = $db->conn;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="public/css/bootstrap.min.css" rel="stylesheet">

  <title>Home</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Lecturers</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">?</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">?</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <div class="container my-4">

    <!-- BUTTON ADD NEW -->
    <div class="my-3">
      <a class="btn btn-primary" href="create.php">Add New</a>
    </div>

    <!-- TABLE -->
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIDN</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $sql = "SELECT * FROM lecturers";
        $result = $conn->query($sql);

        if (!$result) {
          die("<div class='alert alert-danger text-center'>Invalid query!</div>");
        }

        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['nidn']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['join_date']}</td>

              <td>
                <a class='btn btn-success btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'
                   onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>
              </td>
            </tr>
          ";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="public/js/bootstrap.bundle.min.js"></script>

</body>
</html>