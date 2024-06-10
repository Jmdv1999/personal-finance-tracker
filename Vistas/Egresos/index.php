<?php
include "Vistas/Templates/header.php";
?>
<!--Modal-->
<div class="modal fade" id="modal-form" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header">
                        <h6 class="modal-title font-weight-normal" id="titulo">Agregar Egreso</h6>
                    </div>
                    <div class="card-body">
                        <form role="form text-left" method="POST" id="frmEgresos">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="monto" class="form-label">Monto</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="monto" name="monto" placeholder="Monto">
                                </div>
                                <div class="mb-3">
                                    <label for="concepto" class="form-label">Concepto</label>
                                    <input type="text" class="form-control" id="concepto" name="concepto" placeholder="Concepto">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="frmEgresos(event)">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal-form" data-bs-target="#modal-form" onclick="ArreglarEgresos();"> <i class="fas fa-user-plus"></i></button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border mb-0" id="tblEgresos">
                                <thead class="table-light fw-semibold">
                                    <tr class="align-middle">
                                        <th>ID</th>
                                        <th>Monto</th>
                                        <th>Concepto</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
</div>
<?php
include "Vistas/Templates/footer.php";
?>