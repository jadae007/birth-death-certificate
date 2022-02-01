<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php 
  include('./foundationCSS.php') ;
  include('./foundationJS.php');
  ?>
</head>
<body>
  <?php require_once('components/navbar.php'); ?>
<h1>Hello, world!</h1>
    <table id="table">
      <thead>
        <tr>
          <th width="200">Table Header</th>
          <th>Table Header</th>
          <th width="150">Table Header</th>
          <th width="150">Table Header</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Content Goes Here</td>
          <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
          <td>Content Goes Here</td>
          <td>Content Goes Here</td>
        </tr>
        <tr>
          <td>Content Goes Here</td>
          <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
          <td>Content Goes Here</td>
          <td>Content Goes Here</td>
        </tr>
        <tr>
          <td>Content Goes Here</td>
          <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
          <td>Content Goes Here</td>
          <td>Content Goes Here</td>
        </tr>
      </tbody>
    </table>
    <script>
      $(document).ready( function () {
    $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'excel', 'print'
        ]
    });
} );
      $(document).foundation();
    </script>
</body>
</html>