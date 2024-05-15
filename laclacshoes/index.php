<?php 
  ob_start();
  session_start(); 
?>

<body>
<?php

    include_once('model/database.php');
    include_once('view/element/header.php');
    include_once('controller/controller.php');
    include_once('view/element/footer.php');
    
?>
<script src="webroot/js/js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
</body>
</html>