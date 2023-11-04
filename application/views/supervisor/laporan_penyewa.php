<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>
</head>
<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
<!--Replace with your tailwind.css once created-->


<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<style>
    /*Overrides for Tailwind CSS */

    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4F709C;
        /*text-gray-700*/
        padding-left: 1rem;
        /*pl-4*/
        padding-right: 1rem;
        /*pl-4*/
        padding-top: .5rem;
        /*pl-2*/
        padding-bottom: .5rem;
        /*pl-2*/
        line-height: 1.25;
        /*leading-tight*/
        border-width: 2px;
        /*border-2*/
        border-radius: .25rem;
        border-color: #edf2f7;
        /*border-gray-200*/
        background-color: #edf2f7;
        /*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;
        /*bg-indigo-100*/
    }

    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: white !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #4F709C !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: white !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #4F709C !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        /*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }

    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #4F709C !important;
        /*bg-indigo-500*/
    }

    /* code responsive table */
    @media (max-width: 600px) {
        .btn-edit {
            margin-left: 5rem;
        }

        table {
            width: 100%;
        }

        tbody {
            text-align: left;
        }

        .option-select {
            font-size: 12px;
        }

        .td {
            padding-right: none;
            display: flex;
            justify-content: left;
        }

        .responsive-3 {
            width: 100%;
        }

        th {
            display: none;
        }

        td {
            display: grid;
            gap: 0.5rem;
            grid-template-columns: 15ch auto;
            padding: 0.75em 1rem;
        }

        td:first-child {
            padding-top: 2rem;
        }

        td::before {
            content: attr(data-cell) "  : ";
            font-weight: bold;
        }

        .header-data-karyawan {
            gap: 8rem;
        }

        .btn-export {
            height: 2rem;
        }
    }
</style>


<body>
    <!-- demo Section -->
    <div>
        <section id="widget" class=" widget-section pd-top-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <h2 class="title">Laporan Penyewa</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="header-item">
                            <div class="relative">
                                <table style="min-width: 22rem;" id="example"
                                    class="bak w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th data-priority="1" scope="col" class="px-3 py-3">
                                                Nama Penyewa
                                            </th>
                                            <th data-priority="2" scope="col" class="px-3 py-3">
                                                No Ruang
                                            </th>
                                            <th data-priority="3" scope="col" class="px-3 py-3">
                                                Kapasitas
                                            </th>
                                            <th data-priority="4" scope="col" class="px-3 py-3">
                                                Jam Penggunaan
                                            </th>
                                            <th data-priority="5" scope="col" class="px-3 py-3">
                                                Exstra Waktu
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Ahmad Sony
                                            </td>
                                            <td data-cell="No Ruang " class="px-3 py-4">
                                                R.303
                                            </td>
                                            <td data-cell="Kapasitas " class="px-3 py-4">
                                                AC 3 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-3 py-4">
                                                12.00 - 13.30
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-3 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Hanafi
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Sintia Rahmawati
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Mutiara Tsani
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Ajeng Novianti
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Carrisa Putri
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Saskia Rahma
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Qisandra Elysha
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Klisentia Rosawa
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 3, PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                30 menit
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Mutiara Tsani
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.103
                                            </td>

                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 2 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.30 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td data-cell="Nama Penyewa " scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Natalie
                                            </td>
                                            <td data-cell="No Ruang " class="px-6 py-4">
                                                R.150
                                            </td>
                                            <td data-cell="Kapasitas " class="px-6 py-4">
                                                AC 1,5 PK
                                            </td>
                                            <td data-cell="Jam Penggunaan " class="px-6 py-4">
                                                07.00 - 10.00
                                            </td>
                                            <td data-cell="Exstra Waktu " class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>




    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {

            var table = $('#example').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
</body>

</html>