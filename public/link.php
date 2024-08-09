<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="public/css/text.css" rel="stylesheet">
<link href="public/css/main.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<?php
    if(isset($_GET['type'])){
        if($_GET['type']=='cart'){
            echo'<link href="public/css/cart.css" rel="stylesheet">';
        }else if($_GET['type']=='home' || $_GET['type']=='listproduct'){
            echo'<link href="public/css/listproduct.css" rel="stylesheet">';
        }else if($_GET['type']=='detailproduct'){
            echo'<link href="public/css/detailproduct.css" rel="stylesheet">';
        }
    }else{
        echo'<link href="public/css/listproduct.css" rel="stylesheet">';
    }
?>