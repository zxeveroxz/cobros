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

<body>
    <div class="  bg-gray-500 h-screen w-screen p-5 ">

        <div class="w-full overflow-x-auto p-3">
            <table id="example" class="table-auto uppercase min-w-full mx-auto text-left text-sm border-2 border-black  dark:text-white bg-gray-600 ">
                <thead class="border-b font-medium bg-black">
                    <tr>
                        <th data-name="CODCLIENTE">CODIGO</th>
                        <th data-name="NOMBRECLIENTE">NOMBRECLIENTE</th>
                        <th data-name="CIF">NRO. DOCUMENTO</th>
                        <th data-name="TELEFONO1">TELEFONO</th>
                        <th data-name="DIRECCION1" data-orderable="false">DIRECCION</th>
                        <th data-name="OBSERVACIONES">OBSERVACIONES</th>
                    </tr>
                </thead>
                <tfoot class="border-b bg-black font-medium">
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
        <input type="checkbox" id="activarBusqueda">
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

    #example_paginate{
        padding:5px 2px;
        display: flex;
        justify-content:stretch;
  align-items: center;
  flex-direction: column;
    }
</style>


<script>
    function calcularFilasAMostrar() {
        const windowHeight = window.innerHeight;
        const tableHeaderHeight = document.querySelector("#example thead").offsetHeight;

        const rowHeight = 50; // Ajusta este valor según la altura de tus filas en píxeles.

        const maxRows = Math.floor((windowHeight - (tableHeaderHeight)) / rowHeight);

        return maxRows - 2;
    }

    function actualizarTabla() {
        const maxRows = calcularFilasAMostrar();

        const table = $('#example').DataTable();
        table.page.len(maxRows).draw();
    }


    $(document).ready(function() {
        const table = new DataTable('#example', {
            ajax: {
                url: '<?= base_url('login/tabla') ?>',
                type: 'POST'
            },
            "dom": 'rtip',
            "info": false,
            columnDefs: [{
                    width: '50px',
                    targets: [0]
                },
                {
                    width: '300px',
                    targets: [1, 4]
                },
                {
                    width: '150px',
                    targets: [2, 3]
                },

                {
                    visible: 1,
                    targets: []
                }
            ],
            // "autoWidth": false,
            //  bFilter: false,
            processing: true,
            serverSide: true,
            initComplete: function() {

                $t = this;
                // Referencia al checkbox
                const checkbox = document.getElementById('activarBusqueda');

                // Event listener para el cambio de estado del checkbox
                checkbox.addEventListener('change', function() {
                    const isChecked = this.checked;

                    // Recorre todas las columnas y muestra u oculta el footer de búsqueda según el estado del checkbox
                    $t.api().columns().every(function() {
                        let column = this;
                        let footer = column.footer();

                        if (isChecked) {
                            footer.style.display = 'none'; // Oculta el footer
                        } else {
                            footer.style.display = 'table-cell'; // Muestra el footer
                        }
                    });
                });


                $t.api()
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

        actualizarTabla();


        // Actualiza la tabla cuando la ventana cambie de tamaño.
        window.addEventListener("resize", actualizarTabla);

    });
</script>