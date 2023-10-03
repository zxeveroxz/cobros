<?php

use App\Helpers\Componentes;
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" class="dark">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

<style>

    /* automatic/manual light mode */
:root, :root.light {
  --some-value: black;
  --some-other-value: white;
}

/* automatic dark mode */
/* ❗️ keep the rules in sync with the manual dark mode below! */
@media (prefers-color-scheme: dark) {
  :root {
    --some-value: white;
    --some-other-value: black;
  }
}

/* manual dark mode 
/* ❗️ keep the rules in sync with the automatic dark mode above! */
:root.dark {
  --some-value: white;
  --some-other-value: black;
}

/* use the variables */
body {
  color: var(--some-value);
  background-color: var(--some-other-value);
}
</style>

</head>

<body>

    <div class="  bg-gray-500 h-screen w-screen p-1  dark:bg-gray-800   ">

    <P>

    <button class="border" onClick="toggleDarkMode()">Toggle</button>


</P>

        <div class="px-4 md:px-10 py-2  bg-gray-100 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none  text-xl  font-bold leading-normal text-gray-800 dark:text-white ">CLIENTES</p>
                <div>
                <?=Componentes::boton("ddd",'<p class="text-sm font-medium leading-none text-white">Nuevo Cliente</p>','data-modal-target="modal1" data-modal-toggle="modal1"');?>
                   
                </div>
            </div>
        </div>


        <?php
        $bodyNuevoCliente=<<<EOT

        <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                <input type="text" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
            </div>  
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
            </div>
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website URL</label>
                <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required>
            </div>
            <div>
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique visitors (per month)</label>
                <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
        </div> 
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
        </div> 
        <div class="mb-6">
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
            <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
        </div> 
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
            </div>
            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
EOT;
?>    

        <?=Componentes::modal("modal1","Nuevo Cliente",$bodyNuevoCliente,true) ?>
        <div class="bg-white dark:bg-gray-800  shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
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
        https://app.tuk.dev/listing/webapp/table/advance_table
    </div>
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
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

    #example_paginate {
        padding: 5px 2px;
        display: flex;
        justify-content: stretch;
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

        return maxRows - 3;
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





    function toggleDarkMode() {
  if (document.documentElement.classList.contains("light")) {
    document.documentElement.classList.remove("light")
    document.documentElement.classList.add("dark")
  } else if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark")
    document.documentElement.classList.add("light")
  } else {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.classList.add("dark")
    } else {
      document.documentElement.classList.add("light")
    }
  }
}

</script>