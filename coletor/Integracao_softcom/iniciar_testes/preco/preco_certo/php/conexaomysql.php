    <?php

    $conmy = mysqli_connect("localhost", "root", "", "precos");
    
    if (mysqli_connect_errno()) {
        printf ("erro ao conectar ao banco de dados!!!", mysqli_connect_error());
        
    exit();
}
