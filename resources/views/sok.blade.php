<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</head>
<body style="background-color: blueviolet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&display=swap');
        body{
            font-family: 'Comfortaa', cursive;
            font-weight: 700
        }
      </style>

    <script>
        // fungsi untuk menampilkan popup
        function showPopup() {
          // menampilkan popup menggunakan sweetalert
          swal({
            imageUrl: "{{asset('web')}}/PGIP.gif",
            imageWidth: 150,
            imageHeight: 150,
            title: "SOK ASIK BANGET",
    
          }).then(function() {
            // event listener pada tombol "OK" pada popup
            var audio = new Audio('');
            audio.loop = true;
            audio.play();
          });
        }
      
        // atur waktu tampilan popup dalam milidetik (1000 ms = 1 detik)
        var popupDelay = 100; // 5 detik
              
        // atur event yang memicu tampilan popup
        window.onload = function() {
          setTimeout(function() {
            showPopup();
          }, popupDelay);
        }
      </script>
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</body>
</html>