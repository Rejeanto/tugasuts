<?php
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="container">
  <h2>Biodata Mahasiswa</h2>
  <div class="row mb-2"> 
</div>          
  <table id="example" class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Keahlian1</th>
        <th>Keahlian2</th>
        <th>Keahlian3</th>
        <th>Keahlian4</th>
        <th>info1</th>
        <th>info2</th>
        <th>info3</th>
        <th>info4</th>
      </tr>
    </thead>
    <tbody>
<?php
  $strSQL = "SELECT * FROM biodata";
  $execStrSQL = mysqli_query($conn, $strSQL);

  if (mysqli_num_rows($execStrSQL) > 0){
    while ($row = mysqli_fetch_assoc($execStrSQL)){
?>
      <tr>
        <td><a href="view.php?nama=<?= $row["nama"]?>"><?= $row["nama"]?></a></td>
        <td><?= $row["keterangan"]?></td>
        <td><?= $row["keahlian1"]?></td>
        <td><?= $row["keahlian2"]?></td>
        <td><?= $row["keahlian3"]?></td>
        <td><?= $row["keahlian4"]?></td>
        <td><?= $row["info1"]?></td>
        <td><?= $row["info2"]?></td>
        <td><?= $row["info3"]?></td>
        <td><?= $row["info4"]?></td>
        <td>
          <a href="edit.php?nama=<?= $row["nama"] ?>" class="btn btn-primary"> Edit</a>
        </td>
      </tr> 
<?php
  }
}
?>
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>
</body>
</html>
