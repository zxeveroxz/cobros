<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">

</head>

<body class="p-5 bg-white dark:bg-gray-900 antialiased ">




    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead>
                <tr>
                    <th data-name="CODCLIENTE">CODIGO</th>
                    <th data-name="NOMBRECLIENTE">NOMBRECLIENTE</th>
                    <th data-name="CIF">NRO. DOCUMENTO</th>
                    <th data-name="TELEFONO1">TELEFONO</th>
                    <th data-name="DIRECCION1" data-orderable="false">DIRECCION</th>
                    <th data-name="OBSERVACIONES">OBSERVACIONES</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th data-name="CODCLIENTE">CODIGO</th>
                    <th data-name="NOMBRECLIENTE">NOMBRECLIENTE</th>
                    <th data-name="CIF">NRO. DOCUMENTO</th>
                    <th data-name="TELEFONO1">TELEFONO</th>
                    <th data-name="DIRECCION1" data-orderable="false">DIRECCION</th>
                    <th data-name="OBSERVACIONES">OBSERVACIONES</th>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

    thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>


<script>
    $(document).ready(function() {
        var table = new DataTable('#example', {
            ajax: {
                url: '<?= base_url('login/tabla') ?>',
                type: 'POST'
            },
            processing: true,
            serverSide: true,
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        let column = this;
                        let title = column.footer().textContent;

                        // Create input element
                        let input = document.createElement('input');
                        // Lista de clases CSS como una cadena
                        let clasesCSS = 'border placeholder-gray-500 ml-2 px-3 py-2 rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 dark:placeholder-gray-400';
                        // Dividir la cadena en un array de clases individuales
                        let clasesArray = clasesCSS.split(' ');
                        // Agregar cada clase al elemento <input>
                        clasesArray.forEach(clase => {
                            input.classList.add(clase);
                        });
                        input.placeholder = title;
                        column.footer().replaceChildren(input);

                        // Event listener for user input
                        input.addEventListener('keyup', () => {
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            }
                        });
                    });
            }

        });



    });
</script>