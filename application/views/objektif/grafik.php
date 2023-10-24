<div class="container-fluid">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="bar"></canvas>
            </div>
            <hr>
        </div>
    </div>


</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.js"></script> -->


<script>
const url = "<?=base_url();?>";

// Fungsi untuk mengambil data dari server dan membuat bar chart
const createBarChart = () => {
    $.ajax({
        url: url + 'objektif/grafik_data',
        dataType: 'json',
        method: 'get',
        success: data => {
            const chartData = {
                labels: data.map(item => item.nama_lengkap),
                datasets: [{
                    label: 'Nilai',
                    data: data.map(item => item.nilai),
                    backgroundColor: 'lightcoral',
                    borderColor: 'lightcoral',
                    borderWidth: 4
                }]
            };
            const ctx = document.getElementById('bar').getContext('2d');
            const config = {
                type: 'bar',
                data: chartData
            };
            const chart = new Chart(ctx, config);
        }
    });
}

// Panggil fungsi untuk membuat bar chart
createBarChart();
</script>