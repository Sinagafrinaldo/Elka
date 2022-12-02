
var big_data = [];
var big2_data = [];
var totalHarga = 0;
let data_all = [];

function cekHarga() {
    var a = 0
    var b = 0;
    for (var i = 0; i < big_data.length; i++) {
        a = document.getElementById(big_data[i]).innerText;
        a = Number(a)
        b += a;
    }
    // console.log(b);
    document.getElementById("bigTotal").innerHTML = b;
}

function save_data(data2, data3) {
    let datapush = data2.replace(/ .*/, '');
    datapush = 'total' + datapush + data3;
    big_data.push(datapush);
    $data2 = data2.replace(/ .*/, '') + data3;
    big2_data.push($data2);
    // console.log(datapush);
    // console.log("bd", big_data);
    // console.log("bd2", big2_data);
    cekHarga();
    $("#produkList").prop("selectedIndex", 0);
}


function delete_row(rowno) {

    function arrayRemove(arr, value) {

        return arr.filter(function (ele) {
            return ele != value;
        });
    }
    let temp = 'total' + rowno;
    var result = arrayRemove(big_data, temp);
    big_data = result;
    let temp2 = rowno;
    var result2 = arrayRemove(big2_data, temp2);
    big2_data = result2;


    $('#' + rowno).remove();
    cekHarga();

    data_all = data_all.filter((e) => {
        var split = e.nama.split(" ");
        split = split[0] + e.jumlah;
        return split != rowno;       
    })
    // $("#produkList option[value='" + named + "']").removeAttr('disabled');
    // $namaP = $('#produkList').val();
    // $("#produkList option[value='" + $namaP + "']").attr("disabled", "disabled");
}

function aktif(terr) {
    let call = decodeURIComponent(terr)
    console.log(call)

    $("#produkList option[value='" + call + "']").removeAttr('disabled');
}
$('#jumlah').on('keyup change', function () {
    $value = $('#jumlah').val();
    $namaP = $('#produkList').val();
    var str = $("#produkList option:selected").text();
    var stok = str.split(':').pop();
    stok = Number(stok);
    var input = document.getElementById("jumlah");
    input.setAttribute("max", stok);
    $harga = $('#harga').val();
    // console.log(stok)
    if ($value > stok) {
        document.getElementById("jumlah").value = stok;
        $value = stok
    }
    $.ajax({
        type: 'get',
        url: '/admin/input-transaksi/harga',
        data: {
            'harga': $value,
            'namaP': $namaP
        },
        success: function (data) {
            $('#output').html(data);
        }
    });
});

$('#transaksi').on('click', function () {
    let token = $("meta[name='csrf-token']").attr("content");

    for (var i = 0; i < big2_data.length; i++) {
        var tr = document.getElementById(big2_data[i]);
        var td = tr.getElementsByTagName("td");
        $nama = td[0].innerHTML;
        $harga = td[1].innerHTML;
        $harga = Number($harga);

        $jumlah = td[2].innerHTML;
        $jumlah = Number($jumlah);

        $total = td[3].innerHTML;
        $total = Number($total);

        console.log("nama", $jumlah, " harga", $total)

        $.ajax({
            type: 'POST',
            url: '/admin/tambah',
            data: {
                'nama': $nama,
                'harga': $harga,
                'jumlah': $jumlah,
                'total': $total,
                // "_token": "{{ csrf_token() }}"
            },
            success: function (data) {

                window.location.reload()

            },
        });
        Swal.fire({
            title: 'Sukses!',
            text: 'Data transaksi berhasil di input!!',
            icon: 'succes',
        })
    }
})
$('#produkList').on('change', function () {
    var str = $("#produkList option:selected").text();
    var stok = str.split(' ').pop();
    stok = Number(stok);
    var input = document.getElementById("jumlah");
    input.setAttribute("max", stok);

    $value = $('#jumlah').val();
    $namaP = $('#produkList').val();
    $.ajax({
        type: 'get',
        url: '/admin/input-transaksi/harga',
        data: {
            'harga': $value,
            'namaP': $namaP
        },
        success: function (data) {
            $('#output').html(data);
        }
    });
})
$('#bayar').on('change keyup', function () {
    $value = $('#bayar').val();
    $total = document.getElementById("bigTotal").innerText;
    $total = Number($total)
    $value = Number($value)
    $kembali = $total - $value;

    if ($kembali < 0) {
        $('#kembalian').val($value - $total)
    } else {
        $('#kembalian').val(0)
    }

})
$('#keranjang').on('click', function () {
    if ($('#produkList').val() != "null") {


        $value = $('#jumlah').val();
        $namaP = $('#produkList').val();
        $("#produkList option[value='" + $namaP + "']").attr("disabled", "disabled");
        $harga = $('#harga').val();
        $.ajax({
            type: 'get',
            url: '/admin/input-transaksi/keranjang',
            data: {
                'harga': $value,
                'namaP': $namaP
            },
            success: function (data) {
                // $('#outputList').html(data);
                $(data).appendTo($("#outputList"));
                save_data($namaP, $value);
                $('#produkList').val("null")

                data_all.push({
                    "nama": $namaP,
                    "harga": $harga,
                    "jumlah": $value,
                    "total": $harga*$value 
                })
            }
        });
    }
})

$("#nota").on("click", function () {
    var divContents = $("#rincian").html();
    $total = document.getElementById("bigTotal").innerText;
    $total = Number($total);
    $bayar = $('#bayar').val();
    $kembali = $('#kembalian').val();
    $deskripsi = $('textarea#deskripsi').val();
    var printWindow = window.open('', '', 'height=400,width=800');

    // Tanggal sekarang
    var today = new Date();
    time = +today.getHours() + ":" + today.getMinutes() + ":" + today
        .getSeconds();
    today = String(today.getDate()).padStart(2, '0') + '-' + String(today.getMonth() + 1).padStart(2, '0') +
        '-' + today.getFullYear();

    printWindow.document.write(`
             <html>
                    <head>
                        <title>Nota</title>
                        <style>
                            body {
                                font-family: Arial;
                                font-size: 0.8rem
                            }
                        </style>
                    </head>
                <body>
                    <center>
                        <div style="font-size: 1.2rem; font-weight: bold" >Apotek Elka Farma</div>
                    </center>

                    <br>
                    <div style="margin-top: 30px" >
                        Padang Cermin, Kec. Padang Cermin, Kabupaten Pesawaran
                    </div>
                    <div>
                        Tgl: ` + today + `
                    </div>
                    <div>
                        Pukul : ` + time + `
                    </div>
                    <hr style='border: 1px dotted; border-style: none none dotted;' >`)

    data_all.forEach(e => {
        printWindow.document.write(`
                    <p>
                        <div style="margin-bottom: 3px" >` + e.nama + `</div>
                        <div style="display: flex; justify-content: space-between; padding-inline: 10px">
                            <div>Rp. `+ e.harga +`</div>
                            <div>x`+ e.jumlah +`</div>
                            <div>Rp. `+ e.total +`</div>
                        </div>
                    </p>
        `)
    });
    // printWindow.document.write(divContents);
    // printWindow.document.write(`<div style="display: flex;">` + divContents +
    //     `</div> `)
    printWindow.document.write(`            
                    <hr style='border: 1px dotted; border-style: none none dotted;' >
        `)

    printWindow.document.write(`            
                    <p>
                        Total : ` + $total + `
                    </p>
                    <hr style='border: 1px dotted; border-style: none none dotted;' >
                    <p>
                        Bayar : ` + $bayar + ` <br>
                        Kembalian : ` + $kembali + `
                    </p>
                        <p>Catatan : </p>
                        <p>
                            ` + $deskripsi + `
                        </p>
                    </p>
                </body>
            </html>
            <style>
                @page {
                    margin: 0;
                }
                @media print {
                    html, body {
                        width: 58mm;
                        height: 120mm;
                        margin: 0;
                    }
                }
            </style>
        `)
    printWindow.document.close();
    printWindow.print();
});