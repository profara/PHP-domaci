function validateForm() {
    var naslov = document.forms["unosKnjige"]["naslov"].value;
    var cena = document.forms["unosKnjige"]["opis"].value;
    var opis = document.forms["unosKnjige"]["cena"].value;
    var tiraz = document.forms["unosKnjige"]["pregledi"].value;
    if (naslov == "" || cena == "" || opis == "" || tiraz == "") {
      alert("Polja ne smeju biti prazna! ");
      return false;
    }
  }


  
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tabelaKnjige");
  switching = true;
  
  dir = "asc";
  
  while (switching) {
    switching = false;
    rows = table.rows;
   for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
     x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
     if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
           shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
         shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
     if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


