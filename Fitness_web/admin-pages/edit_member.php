<?php
include('connection.php');

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM addmember WHERE idmember=$id");
    $data = mysqli_fetch_array($result);
}

// Update atau edit member dan cek ke database
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $namamember = $_POST['namamember'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $memberplan = $_POST['memberplan'];
    $mulaimember = $_POST['mulaimember'];
    $memberexpired = $_POST['memberexpired'];

    mysqli_query($mysqli, "UPDATE addmember SET namamember='$namamember', umur='$umur', alamat='$alamat', memberplan='$memberplan', mulaimember='$mulaimember', memberexpired='$memberexpired' WHERE idmember=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Member</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $data['idmember']; ?>">
            <div class="form-group">
                <label for="namamember">Nama Member:</label>
                <input type="text" class="form-control" name="namamember" value="<?php echo $data['namamember']; ?>" required>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="text" class="form-control" name="umur" value="<?php echo $data['umur']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="memberplan">Member Plan:</label>
                <input type="text" class="form-control" name="memberplan" value="<?php echo $data['memberplan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="mulaimember">Mulai Member:</label>
                <input type="date" class="form-control" name="mulaimember" value="<?php echo $data['mulaimember']; ?>" required>
            </div>
            <div class="form-group">
                <label for="memberexpired">Member Expired:</label>
                <input type="date" class="form-control" name="memberexpired" value="<?php echo $data['memberexpired']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>