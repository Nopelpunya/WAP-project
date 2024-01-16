<?php
    include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Member Fitness</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">PortaFitness</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Member Fitness
                            </a>
                            <a class="nav-link" href="perlengkapan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Alat dan perlengkapan gym/fitness
                            </a>
                            <a class="nav-link" href="trainer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trainer
                            </a>
                            <a class="nav-link" href="logout.php">
                                LOGOUT
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Member Fitness</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah member baru
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" collspacing="0">
                                       <thead> 
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Member Plan</th>
                                            <th>Mulai member</th>
                                            <th>Member expired</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        
                                            <?php
                                            include('connection.php');
                                            $tampilditable = mysqli_query($mysqli, "SELECT * FROM addmember");
                                            while ($data = mysqli_fetch_array($tampilditable)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $data['idmember'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['namamember'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['umur'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['alamat'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['memberplan'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['mulaimember'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['memberexpired'];?>
                                                    </td>
                                                    <td>
                                                        <a href="edit_member.php?id=<?php echo $data['idmember']; ?>" class="btn btn-warning btn-sm">Update</a>
                                                        <a href="delete_member.php?id=<?php echo $data['idmember']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <!--body modal-->
                <form method="post">
                    <div class="modal-body">       
                        <input type="num" name="idmember" placeholder="Id Member" class="form-control">
                        <br> 
                        <input type="text" name="namamember" placeholder="Nama Member" class="form-control">
                        <br>
                        <input type="num" name="umur" placeholder="Umur Member" class="form-control">
                        <br>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control">
                        <br>
                        <input type="text" name="memberplan" placeholder="Member Plan" class="form-control">
                        <br>
                        <input type="date" name="mulaimember" placeholder="Mulai Member" class="form-control">
                        <br>
                        <input type="date" name="memberexpired" placeholder="Member Expired" class="form-control">
                        <br>
                        <button type="submit" name="tambahmember" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>