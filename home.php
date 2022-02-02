<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
  require('mdbCSS.php');
  require('mdbJS.php');
  ?>
</head>

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1">
      </div>
      <div class="col-10">
      <table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>

  </tbody>
</table>
      </div>
      <div class="col-1">
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#table').DataTable();
    })
  </script>
</body>

</html>