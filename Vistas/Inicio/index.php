<?php
include "Vistas/Templates/header.php";
?>
<div class="body flex-grow-1 px-3 mb-3">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6"height="400">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header position-relative d-flex justify-content-center align-items-center bg-primary">
                                <i class="fa-solid fa-arrow-trend-up icon icon-3xl text-white my-4"></i>
                            </div>
                            <div class="card-body row text-center">
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["ingresos"]["total"]) ?>$</div>
                                    <div class="text-uppercase text-medium-emphasis small">Ingresos</div>
                                </div>
                                <div class="vr"></div>
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["ingresos"]["cuenta"]) ?></div>
                                    <div class="text-uppercase text-medium-emphasis small">Registros</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header position-relative d-flex justify-content-center align-items-center bg-warning">
                                <i class="fa-solid fa-arrow-trend-down icon icon-3xl text-white my-4"></i>
                            </div>
                            <div class="card-body row text-center">
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["egresos"]["total"]) ?>$</div>
                                    <div class="text-uppercase text-medium-emphasis small">Egresos</div>
                                </div>
                                <div class="vr"></div>
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["egresos"]["cuenta"]) ?></div>
                                    <div class="text-uppercase text-medium-emphasis small">Registros</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header position-relative d-flex justify-content-center align-items-center bg-danger">
                                <i class="fa-solid fa-sack-xmark icon icon-3xl text-white my-4"></i>
                            </div>
                            <div class="card-body row text-center">
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["deudas"]["total"]) ?>$</div>
                                    <div class="text-uppercase text-medium-emphasis small">Deudas</div>
                                </div>
                                <div class="vr"></div>
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["deudas"]["cuenta"]) ?></div>
                                    <div class="text-uppercase text-medium-emphasis small">Registros</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header position-relative d-flex justify-content-center align-items-center bg-info">
                                <i class="fa-solid fa-scale-balanced icon icon-3xl text-white my-4"></i>
                            </div>
                            <div class="card-body row text-center">
                                <div class="col">
                                    <div class="fs-5 fw-semibold"><?php echo ($data["ingresos"]["total"] - $data["egresos"]["total"]) ?>$</div>
                                    <div class="text-uppercase text-medium-emphasis small">Balance</div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Comparativa de gastos
                    </div>
                    <div class="card-body">
                        <canvas id="Grafico"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url; ?>Assets/js/chart.min.js"></script>
<script>

    ReporteStock();

    function ReporteStock() {

        stockMinimo = document.getElementById('Grafico');
        var ChartMinimo = new Chart(stockMinimo, {
            type: 'pie',
            data: {
                labels: ["Gastos", "Ingresos", "Deudas"],
                datasets: [{
                    label: 'Comparativa de gastos',
                    data: ['<?php echo ($data["egresos"]["total"]); ?>', '<?php echo ($data["ingresos"]["total"]); ?>', '<?php echo ($data["deudas"]["total"]); ?>'],
                    backgroundColor: ['#f9b115', '#321fdb', '#e55353'],
                    hoverOffset: 4
                }],
            },
        });

    }
</script>
<?php
include "Vistas/Templates/footer.php";
?>