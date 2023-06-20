<?php
include '../../index.php';
include '../../models/AccesoDatos.php';
include '../../models/Animal.php';
include '../../models/Refugio.php';
include '../../models/crud/funcionesCrud.php';

$email = $_SESSION['email'];
$refugio = getRefugio($email);

$array_animales = getAnimalesRefugio($refugio->nif);
$fechaActual = getdate();

?>
<div class="container">
    <h2>Mi cuenta</h2>

    <div style="height:100%" class="card ">
        <div class="card-header">Gestión de Mascotas</div>
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div style="height: 250px; margin-bottom:25px" class="col-md-2 gatocard">
                        <div style=" height: 250px" class="card">
                            <a style=' margin-top:35px; align-self:center; color: #00afa1; font-size:100px;' href="./registro_animales.php"> +</a>
                        </div>
                    </div>
                    <!-- Tarjeta de animal bucle -->
                    <?php foreach ($array_animales as $animal) : ?>
                        <?php $ano = substr($animal->fecha_nac, 0, 4);
                        $mes = substr($animal->fecha_nac, 5, 2);
                        $dia = substr($animal->fecha_nac, 8, 2); ?>
                        <div style="height: 250px; margin-bottom:25px" class="col-md-2 gatocard">
                            <div style="height: 100%" class="card">
                                <img style="height: 50%;" src="<?php echo "../../../assets/images/mascotas/" . $animal->especie . "/" . $animal->microchip . "." . $animal->extension_imagen ?>" class="card-img-top" alt=<?= $animal->nombre ?>>
                                <div style="height: 100px;" class="card-body">
                                    <h5 class="card-title"><?= $animal->nombre ?></h5>
                                    <p class="card-text">Edad: <?= $fechaActual["year"] - $ano ?> años
                                    <a style="height:40px; margin-top:5px" href="./edicion_animales.php?animal=<?= $animal->microchip ?>" class="btn boton-animales"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>&nbsp;editar</a>
                                        </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>




            </div>
        </div>

        <div class="card-footer"><a href="./mi_perfil.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                </svg>&nbsp;Atrás</a></div>
    </div>
</div>




</div>
<div class="container-fluid ">
    <?php

    include_once '../inicio/footer.php';

    ?>
</div>
</div>