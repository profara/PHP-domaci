<?php include("broker.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjige</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://www.dafontfree.net/embed/c3BlY2lmeS1wZXJzb25hbC1ub3JtYWwtYmxhY2smZGF0YS81Mi9zLzE1Njg5Ny9TcGVjaWZ5UEVSU09OQUwtTm9ybUJsYWNrLnR0Zg" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/knjiga.css?<?php echo time(); ?>" type="text/css">

</head>

<body>

    <nav><a href="home.php">
            <ul id="prva">
                <li style="color:#FFD700"><b>blackberries</b></li>
            </ul>
        </a>
    </nav>

    <div id="pretraga" class="d-flex justify-content-center">
        <div class="content d-flex flex-column">
            <form action="">
                <label for="fname">Pretrazi po naslovu:</label>
                <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
            </form>
            <p><span id="txtHintt"></span></p>
        </div>
    </div>



    <main class="container p-4 ">



        <div class="row d-flex justify-content-center">


            <div class="d-flex flex-column">
                <form>
                    <select style="background-color: #3333ff;" name="users" onchange="showUser(this.value)">
                        <option value="">Selektuj korisnika:</option>
                        <option value="1">Admin</option>
                        <option value="2">Aleksandar</option>
                    </select>
                </form>
                <br>
                <div id="txtHint"><b></b></div>
            </div>




            <div id="dodavanje" class="col-md-5">
                <div class="card card-body">
                    <form action="controller/add.php" id="dodajForm" name="unosKnjige" onsubmit="return validateForm()" method="POST">

                        <div class="form-group">
                            <input type="text" name="naslov" class="form-control" placeholder="Naslov" autofocus>
                        </div>

                        <div class="form-group">
                            <textarea name="opis" rows="5" class="form-control" placeholder="Opis"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="cena" class="form-control" placeholder="Cena">
                        </div>

                        <div class="form-group">
                            <input type="text" name="tiraz" class="form-control" placeholder="Tiraz">
                        </div>


                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Sacuvaj knjigu">

                    </form>
                </div>
            </div>
            <div class="col-md-9 mt-5">
                <table id="tabelaKnjiga" class="table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Naslov</th>
                            <th>Opis</th>
                            <th onclick="sortTable(2)">Cena</th>
                            <th>Tiraz</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT knjigaID,naslov,cena,opis,tiraz FROM knjiga";
                        $knjige = $conn->query($query);

                        while ($row = mysqli_fetch_array($knjige)) { ?>
                            <tr>
                                <td><?php echo $row['naslov']  ?></td>
                                <td><?php echo $row['opis']  ?></td>
                                <td><?php echo $row['cena']  ?></td>
                                <td><?php echo $row['tiraz']  ?></td>
                                <td>
                                    <a href="controller/edit.php?id=<?php echo $row['knjigaID'] ?>">Izmeni</a>
                                    <a id="btn-obrisi" href="controller/delete.php?id=<?php echo $row['knjigaID'] ?>">Obrisi</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>








    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                xmlhttp.send();
            }
        }

        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHintt").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHintt").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>


</body>

</html>