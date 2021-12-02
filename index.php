<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="py-5">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-8 comp-grid">
                    <h6 >SELAMAT DATANG DI PEMILIHAN PENERIMA SEMBAKO</h6>
                </div>
            </div>
        </div>
    </div>
    <div  class="py-5">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-10 comp-grid">
                    <div class=""><div><body style="background-image: url(2.jpeg);"></div>
                    </div>
                </div>
                <div class="col-md-12 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_tabelhasil();
                        ?>
                        <div>
                            <h4>Tabel hasil</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="barchart_tabelhasil"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'HASIL',
                            backgroundColor:'rgba(255 , 0 , 0, 0.5)',
                            borderColor:'rgba(255 , 255 , 0, 0.7)',
                            type:'',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_tabelhasil');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
