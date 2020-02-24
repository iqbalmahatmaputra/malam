<!DOCTYPE html>

<html lang="id">

<head>

      <meta charset="utf-8">

      <title>Data Barang</title>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

 

<div class="container">

      <h1>Data <small>Mahasiswa</small></h1>

      <table class="table table-bordered table-striped" id="mydata">

            <thead>

                  <tr>

                        <td>Nama</td>

                        <td>Email</td>

                        <td>NIM</td>


                  </tr>

            </thead>

            <tbody>

                  <?php

                        foreach($data->result_array() as $i):

                              

                              $nama=$i['name'];

                              $email=$i['email'];

                              $nim=$i['nim'];

                  ?>

                  <tr>

                     

                        <td><?php echo $nama;?> </td>

                        <td><?php echo $email;?> </td>

                        <td><?php echo $nim;?> </td>

                  </tr>

                  <?php endforeach;?>

            </tbody>

      </table>
      <a href="<?= base_url('user/index'); ?>">Ke User</a>

     

</div>

 

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"> </script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>

      $(document).ready(function(){

            $('#mydata').DataTable();

      });

</script>

</body>

</html>