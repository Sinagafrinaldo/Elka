$("#nota").on("click", function () {
    var title = "Laporan Pemasukan";
    var tanggal2 = $('#tanggal2').val();
    var tanggal1 = $('#tanggal1').val();

    if (tanggal1 == "") {
        tanggal2 = $('#tgl2').val();
        tanggal1 = $('#tgl1').val();
    }

    console.log(tanggal1);

    // Tanggal sekarang
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
        'padding-inline:5em;' +
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
                        Periode : ` + tanggal1 + ` - ` + tanggal2 + `
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
    // $tanggal2 = new Date(tanggal2);
    // $tanggal1 = new Date(tanggal1);
    var parts = tanggal1.split('/');
    var mydate1 = (parts[2]) + '-' + (parts[1]) + '-' + parts[0];
    var parts2 = tanggal2.split('/');
    var mydate2 = (parts2[2]) + '-' + (parts2[1]) + '-' + parts2[0];
    // console.log(typeof (tanggal2))
    console.log(mydate1)
    $.ajax({
        type: 'get',
        url: '/admin/laporan-pemasukan/sort',
        data: {
            'tanggal1': mydate1,
            'tanggal2': mydate2,
        },
        success: function (data) {
            $('#output').html(data);
            console.log('Sukses')
            $("#paginasi").hide();
        },

    });
});