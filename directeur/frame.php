<?php
include_once 'template.php';
?>
<!DOCTYPE html>
<html>
<!-- head -->
    <?php
    head();
    ?>
<body>
    <!-- Navigation et bandeau-->
    <?php
    Navigation();
    ?>
	
    <!-- Section pincipale-->
    <div class="container-fluid">
        <div class="row no-gutters">
                <!-- Sidebar -->
                <?php
                    sidebar();
                ?>

                <!-- Contenu à droit -->
                <div class="col-md-10">
                   
                </div>
        </div>
    </div>
</body>
</html>