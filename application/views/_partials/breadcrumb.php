<?php
    if ($this->session->flashdata('success')) {
        $this->load->view("_partials/alert",["alert" => "success", "msg" => $this->session->flashdata('success')]);
        echo "<br>";
    }
?>
<ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active small"><?php echo $title?></li>
</ol>
<div class="card mb-4">
<div class="card-body">
