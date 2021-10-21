<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Admin</h2>
<?php
include "koneksi.php";
include "fungsi.php";
$nama = $keterangan = $keahlian1 =$keahlian2 = $keahlian3 = $keahlian4 = $info1 = $info2 = $info3 = $info4 = "";
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $nama = bersihkan_input($_POST['nama']);
    $keterangan = bersihkan_input($_POST['keterangan']);
    $keahlian1 = bersihkan_input($_POST['keahlian1']);
    $keahlian2 = bersihkan_input($_POST['keahlian2']);
    $keahlian3 = bersihkan_input($_POST['keahlian3']);
    $keahlian4 = bersihkan_input($_POST['keahlian4']);
    $info1 = bersihkan_input($_POST['info1']);
    $info2 = bersihkan_input($_POST['info2']);
    $info3 = bersihkan_input($_POST['info3']);
    $info4 = bersihkan_input($_POST['info4']);
    $strSQL = "UPDATE biodata SET
    keterangan='$keterangan',  
    keahlian1='$keahlian1',
    keahlian2='$keahlian2',
    keahlian3='$keahlian3',
    keahlian4='$keahlian4', 
    info1='$info1',
    info2='$info2',
    info3='$info3',
    info4='$info4',
    nama='$nama'";
    
    //echo "Query = ". $strSQL;
    $execStrSQL = mysqli_query($conn, $strSQL);
    if ($execStrSQL){
?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b>Data Berhsil</b> ditambahkan ke dalam DataBase
        </div>
<?php
    }
    else {
?>
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b>Data Tidak Berhsil</b> ditambahkan ke dalam DataBase<br>
            <?php echo "Error: ".$execStrSQL. "<br>".mysqli_error($conn); ?>
        </div>

<?php
        
    }
}
else{
    if(isset($_GET['nama'])){
        $nama = bersihkan_input($_GET['nama']);
        $strSQL = "SELECT * FROM biodata WHERE nama='$nama'";
        $execStrSQL = mysqli_query($conn, $strSQL);
        if (mysqli_num_rows($execStrSQL)) {
        while ($row = mysqli_fetch_assoc($execStrSQL)){
                $keterangan = $row['keterangan'];
                $keahlian1 = $row['keahlian1'];
                $keahlian2 = $row['keahlian2'];
                $keahlian3 = $row['keahlian3'];
                $keahlian4 = $row['keahlian4'];
                $info1 = $row['info1'];
                $info2 = $row['info2'];
                $info3 = $row['info3'];
                $info4 = $row['info4'];
            }
        }
    }
}

?>
    <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">        
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th><input type="text" class="form-control" name="nama" value="<?= $nama ?>" ></th>       
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Keterangan</td>        
                <td><input type="text" class="form-control" name="keterangan" value="<?= $keterangan ?>"></td>       
            </tr>
            <tr>
                <td>Keahlian1</td>        
                <td><input type="text" class="form-control" name="keahlian1" value="<?= $keahlian1 ?>"></td>       
            </tr>
            <tr>
                <td>Keahlian2</td>        
                <td><input type="text" class="form-control" name="keahlian2" value="<?= $keahlian2 ?>"></td>       
            </tr>
            <tr>
                <td>Keahlian3</td>        
                <td><input type="text" class="form-control" name="keahlian3" value="<?= $keahlian3 ?>"></td>       
            </tr>
            <tr>
                <td>Keahlian4</td>        
                <td><input type="text" class="form-control" name="keahlian4" value="<?= $keahlian4 ?>"></td>       
            </tr>
            <tr>
                <td>info1</td>        
                <td><input type="text" class="form-control" name="info1" value="<?= $info1 ?>"></td>       
            </tr>
            <tr>
                <td>info2</td>        
                <td><input type="text" class="form-control" name="info2" value="<?= $info2 ?>"></td>       
            </tr>
            <tr>
                <td>info3</td>        
                <td><input type="text" class="form-control" name="info3" value="<?= $info3 ?>"></td>       
            </tr>
            <tr>
                <td>info4</td>        
                <td><input type="text" class="form-control" name="info4" value="<?= $info4 ?>"></td>       
            </tr>
        </tbody>
    </table>
    <div class="row mb-2">
        <div class="col-sm-12">    
            <span class="m-1">                
                <button type="submit" href="viewall.php" class="btn btn-primary">
                    Simpan
                </button>
            </span>
            <td>
                <a href="viewall.php" class="btn btn-danger"> Kembali</a>
            </td>
        </div> 
    </div>
  </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>
</html>
