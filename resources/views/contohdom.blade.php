<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Bottom navbar example · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-bottom/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
  </head>
  <body>
    
<main class="container">
  <div class="bg-light p-5 rounded mt-3">
    <h1>Contoh DOM</h1>
    <p class="lead">Contoh implementasi DOM sederhana</p>
  </div>

  <div class="bg-light p-5 rounded mt-3">
  <form action="#">
    <div class="row">
            Pilih salah satu warna
            <div class="col">
                <select class="form-select" id="warna" name="warna" onchange="myFunction()">
                    <option value="btn btn-danger">Merah</option>
                    <option value="btn btn-success">Hijau</option>
                    <option value="btn btn-warning">Kuning</option>
                </select>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" id="tombol">Biru</button>
            </div>
        
    </div>
    </form>
  </div>

</main>


<script>
function myFunction() {
//   mendapatkan nilai value dari option yang dipilih
  var var_combobox = document.getElementById("warna").value;
//   mendapatkan tulisan merah/hijau/kuning
  var warna = "";
    if (var_combobox==='btn btn-danger') {
        warna = "Merah";
    }else if(var_combobox==='btn btn-success'){
        warna = "Hijau";
    }else{
        warna = "Kuning";
    }
    
  document.getElementById("tombol").setAttribute("class", var_combobox); 
  document.getElementById("tombol").innerHTML = warna; 
}
</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      
  </body>
</html>
