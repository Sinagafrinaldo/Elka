$("#nota").on("click", function () {
    var title = "Laporan Barang Sisa"

    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
    ];

    var today = new Date();
    today = String(today.getDate()).padStart(2, '0') + ' ' +
        String(months[today.getMonth()]).padStart(2, '0') + ' ' +
        today.getFullYear();

    var divContents = $("#rincian").html();
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table, th, td {' +
        'border:1px solid;' +
        'border-collapse:collapse;' +
        'padding:0.8em;' +
        '}' +
        'body {' +
        'align-self:center;' +
        '}' +
        '</style>';
    htmlToPrint += divContents;
    var printWindow = window.open('', '', 'height=800,width=1600');

    printWindow.document.write(
        `
        <html>
                <head>
                    <title>` + title + `</title>
                </head>
            <body>
                <center>
                    <p style="font-size: 1.4rem; font-weight: bold;">
                        Apotek Elka Farma
                    </p>
                    <div style="font-size: 1.6rem; font-weight: bold; margin-bottom: 0.5rem;" >
                        ` + title + `
                    </div>
                    <div style="margin-bottom: 3rem;" >
                    </div>
                </center>
    `)

    printWindow.document.write(`<center>` + htmlToPrint + `</center>`);

    printWindow.document.write(`
                <div style="display: flex; margin-top: 3rem;" >
                    <div style="margin-left: auto; margin-right: 2rem;" >
                        <div style="margin-bottom: 5rem;" >
                            Pesawaran, ` + today + `
                        </div>
                        <div style="text-align: center;" >
                            (Benni Ginting)
                        </div>
                    </div>
                </div>
            </body>
            </html>
            <style>
                body{
                    padding-top: 30px;
                }
                @page {
                    margin: 0;
                }
            </style>
        `)
    printWindow.document.close();
    printWindow.print();
});
$('#tampil').on('click', function () {
    var tanggal2 = $('#tanggal2').val();
    var tanggal1 = $('#tanggal1').val();
    console.log(typeof (tanggal2))
    console.log(tanggal1)
    $.ajax({
        type: 'get',
        url: '/admin/laporan-barang-masuk/sort',
        data: {
            'tanggal1': tanggal1,
            'tanggal2': tanggal2,
        },
        success: function (data) {
            $('#output').html(data);
            console.log('Sukses')
        },

    });
});
$('#tampilMinim').on('click', function () {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: '/admin/laporan-barang-sisa/minim',
        data: {
            'search': $value,
        },
        success: function (data) {
            $('#output').html(data);
            $("#paginasi").hide();
        }
    });
})