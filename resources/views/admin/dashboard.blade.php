@extends('template.admin')
@section('konten')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div>
        <h1 class="text-center mt-5">
            <span class="text-5xl font-bold">DASHBOARD</span>
        </h1>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card"  style="background-color: #D9D9D9;">
                <div class="card-body">
                <h5 class="card-title about" style="font-weight: bold;">User</h5>
                <p>{{ $user }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card"  style="background-color: #D9D9D9;">
                <div class="card-body">
                <h5 class="card-title about" style="font-weight: bold;">Pesanan Berhasil</h5>
                <p>{{ $statusberhasil }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card"  style="background-color: #D9D9D9;">
                <div class="card-body">
                <h5 class="card-title about" style="font-weight: bold;">Pesanan Belum Terbayar</h5>
                <p>{{ $statusbelum }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card"  style="background-color: #D9D9D9;">
                <div class="card-body">
                <h5 class="card-title about" style="font-weight: bold;">Pesanan Dibatalkan</h5>
                <p>{{ $statusbatal }}</p>
                </div>
            </div>
        </div>
        
    
    </div>
</br>
    <div style="width: 700px; height: 650px;" >
        <h5 class="font-bold">Pesanan</h5>
        <canvas id="myChart"></canvas>
    </div>

<script>

    let orderFind = @json($pesanan); //mengubah array json php ke js
    const monthNamesMap = {
    1: "Jan",
    2: "Feb",
    3: "Mar",
    4: "Apr",
    5: "Mei",
    6: "Jun",
    7: "Jul",
    8: "Aug",
    9: "Sep",
    10: "Okt",
    11: "Nov",
    12: "Des",
    };
    const orderFormat = [];

    orderFind.forEach((product) => {
        orderFormat.push({
        month: monthNamesMap[product.month],
        pesanan: product.pesanan,
        });
    });

    for (let i = 1; i <= 12; i++) {
        const existingMonth = orderFormat.find(
        (order) => order.month === monthNamesMap[i]
        );
        if (!existingMonth) {
        orderFormat.push({
            month: monthNamesMap[i],
            pesanan: 0,
        });
        }
    }

    orderFormat.sort(
        (a, b) =>
        Object.values(monthNamesMap).indexOf(a.month) -
        Object.values(monthNamesMap).indexOf(b.month)
    );

    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: orderFormat.map((pesanan)=>pesanan.month),
        datasets: [{
            label:['Pesanan'],
            data: orderFormat.map((pesanan)=>pesanan.pesanan),
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>


@endsection