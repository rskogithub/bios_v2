<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important;
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Rasio Lancar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th></th>
		<th>R</th>
		<th></th>
		<th>V</th>
		
            </tr><?php
            foreach ($rasio_aktiva_lancar_data as $rasio_aktiva_lancar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rasio_aktiva_lancar-> ?></td>
		      <td><?php echo $rasio_aktiva_lancar->r ?></td>
		      <td><?php echo $rasio_aktiva_lancar-> ?></td>
		      <td><?php echo $rasio_aktiva_lancar->v ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>