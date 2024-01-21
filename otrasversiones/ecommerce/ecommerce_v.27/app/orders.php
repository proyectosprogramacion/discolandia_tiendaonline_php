<?php
require_once("../config.php");
?>



<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Ordenes de compra:

        </h1>
        <h4 class="bg-success">
            <?php display_message() ?>
        </h4>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>

                <tr>
                    <th>Referencia transacción</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                display_orders();
                ?>


            </tbody>
        </table>
    </div>