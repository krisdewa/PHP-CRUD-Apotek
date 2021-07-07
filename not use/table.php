<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Phone</th>
      <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php

    include_once("../connectdb.php");

    $res = $conn->query("select * from supplier");
    while ($row = $res->fetch_assoc()) {
?>
   
      <tr>
        <td><?php echo $row['ID_Supplier']; ?></td>
        <td><?php echo $row['nama_supplier']; ?></td>
        <td><?php echo $row['alamat_supplier']; ?></td>
        <td><?php echo $row['alamat_supplier']; ?></td>
      <td><?php echo $row['No_Telp']; ?></td>
        <td>
        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['ID_Supplier']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a class="btn btn-danger btn-sm" onclick="deletedata('<?php echo $row['ID_Supplier']; ?>')"  ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['kode']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['kode']; ?>">Edit Data</h4>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group">
    <label for="nm">Nama</label>
    <input type="text" class="form-control" id="nm<?php echo $row['kode']; ?>" value="<?php echo $row['nama']; ?>">
  </div>
  <div class="form-group">
    <label for="gd">Gender</label>
    <input type="text" class="form-control" id="gd<?php echo $row['kode']; ?>" value="<?php echo $row['gender']; ?>">
  </div>
  <div class="form-group">
    <label for="pn">Phone</label>
    <input type="text" class="form-control" id="pn<?php echo $row['kode']; ?>" value="<?php echo $row['phone']; ?>">
  </div>
  <div class="form-group">
    <label for="al">Alamat</label>
    <input type="text" class="form-control" id="al<?php echo $row['kode']; ?>" value="<?php echo $row['alamat']; ?>">
  </div>
 
</form>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updatedata('<?php echo $row['kode']; ?>')" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
       
        </td>
      </tr>
<?php
}
?>
    </tbody>
      </table>
    

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>    
</body>
</html>