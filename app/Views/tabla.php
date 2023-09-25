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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th data-orderable="false">Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
    </table>
</div>

</body>


<script>
    $(document).ready(function() {
        new DataTable('#example', {
            
            ajax:  {url:'<?=base_url('login/tabla')?>',type:'POST'},
            
            processing: true,
            serverSide: true,


        });
    });
</script>