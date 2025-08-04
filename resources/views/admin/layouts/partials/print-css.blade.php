<style>
    @media print {

        html,
        body {
            height: auto !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: visible !important;
        }

        .table-responsive {
            overflow: visible !important;
        }

        table {
            width: 100% !important;
            border-collapse: collapse !important;
            page-break-inside: auto !important;
        }

        thead {
            display: table-header-group !important;
        }

        tfoot {
            display: table-footer-group !important;
        }

        tr {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
        }

        /* Esconde footer manual, se estiver no HTML */
        #print-footer {
            display: none !important;
        }
    }

    @page {
        size: A4 portrait;
        margin: 10mm 10mm 12mm 10mm; /* margem inferior reduzida */

        @bottom-center {
            content: "Página " counter(page) " de " counter(pages) " • Bethel360 • www.bethel360.com.br";
            font-size: 10px;
            color: #999;
        }
    }
</style>
