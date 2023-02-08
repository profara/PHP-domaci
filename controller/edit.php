<?php
include("../broker.php");
$naslov = '';
$cena = 0;
$opis = '';
$tiraz = 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM knjiga WHERE knjigaID=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $naslov = $row['naslov'];
        $cena = $row['cena'];
        $opis = $row['opis'];
        $tiraz = $row['tiraz'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $naslov = $_POST['naslov'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
    $tiraz = $_POST['tiraz'];

    $query = "UPDATE knjiga SET naslov = '$naslov', cena = '$cena',opis = '$opis',tiraz = '$tiraz' WHERE knjigaID=$id";
    mysqli_query($conn, $query);

    header('Location: ../home.php');
}

?>


<style> </style>

<body style="background-color: #171717;">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body" style=" background-color: #3333ff; color:whitesmoke;border-radius: 0.8rem; padding:1.5rem">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input name="naslov" type="text" class="form-control" value="<?php echo $naslov; ?>" placeholder="Izmeni naslov">
                        </div>
                        <div class="form-group">
                            <textarea name="opis" class="form-control" cols="30" rows="10"><?php echo $opis; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input name="cena" type="text" class="form-control" value="<?php echo $cena; ?>" placeholder="Izmeni cenu">
                        </div>
                        <div class="form-group">
                            <input name="tiraz" type="text" class="form-control" value="<?php echo $tiraz; ?>" placeholder="Izmeni tiraz">
                        </div>
                        <button class="btn btn-primary btn-block" name="update">
                            Izmeni
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>