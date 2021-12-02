<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['no_kk']) ? urlencode($data['no_kk']) : null);
$counter++;
?>
<div class="col-sm-4">
    <div class="bg-light p-2 mb-3 animated bounceIn">
        <div class="mb-2">  
            <span class="font-weight-light text-muted d-block">
                No Kartu keluarga
            </span>
        <?php echo $data['no_kk']; ?></div>
        <div class="mb-2">  
            <span  data-value="<?php echo $data['nama_lengkap']; ?>" 
                data-pk="<?php echo $data['no_kk'] ?>" 
                data-url="<?php print_link("data_penduduk/editfield/" . urlencode($data['no_kk'])); ?>" 
                data-name="nama_lengkap" 
                data-title="Enter Nama Lengkap" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <span class="font-weight-light text-muted d-block">
                    Nama Lengkap
                </span>
                <?php echo $data['nama_lengkap']; ?> 
            </span>
        </div>
        <div class="mb-2">  
            <span  data-value="<?php echo $data['tempat_lahir']; ?>" 
                data-pk="<?php echo $data['no_kk'] ?>" 
                data-url="<?php print_link("data_penduduk/editfield/" . urlencode($data['no_kk'])); ?>" 
                data-name="tempat_lahir" 
                data-title="Enter Tempat Lahir" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <span class="font-weight-light text-muted d-block">
                    Tempat Lahir
                </span>
                <?php echo $data['tempat_lahir']; ?> 
            </span>
        </div>
        <div class="mb-2">  
            <span  data-value="<?php echo $data['tanggal_lahir']; ?>" 
                data-pk="<?php echo $data['no_kk'] ?>" 
                data-url="<?php print_link("data_penduduk/editfield/" . urlencode($data['no_kk'])); ?>" 
                data-name="tanggal_lahir" 
                data-title="Enter Tanggal Lahir" 
                data-placement="right" 
                data-toggle="mouseenter" 
                data-type="date" 
                data-mode="popover" 
                data-showbuttons="bottom" 
                class="is-editable" >
                <span class="font-weight-light text-muted d-block">
                    Tanggal Lahir
                </span>
                <?php echo $data['tanggal_lahir']; ?> 
            </span>
        </div>
        <div class="mb-2">  
            <span  data-value="<?php echo $data['jenis_kelamin']; ?>" 
                data-pk="<?php echo $data['no_kk'] ?>" 
                data-url="<?php print_link("data_penduduk/editfield/" . urlencode($data['no_kk'])); ?>" 
                data-name="jenis_kelamin" 
                data-title="Enter Jenis Kelamin" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <span class="font-weight-light text-muted d-block">
                    Jenis Kelamin
                </span>
                <?php echo $data['jenis_kelamin']; ?> 
            </span>
        </div>
        <div class="mb-2">  
            <span  data-value="<?php echo $data['alamat']; ?>" 
                data-pk="<?php echo $data['no_kk'] ?>" 
                data-url="<?php print_link("data_penduduk/editfield/" . urlencode($data['no_kk'])); ?>" 
                data-name="alamat" 
                data-title="Enter Alamat" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <span class="font-weight-light text-muted d-block">
                    Alamat
                </span>
                <?php echo $data['alamat']; ?> 
            </span>
        </div>
        <div class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("data_penduduk/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("data_penduduk/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("data_penduduk/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                <i class="fa fa-times"></i>
                Delete
            </a>
        </div>
    </div>
</div>
<?php 
}
?>
<?php
} else {
?>
<td class="no-record-found col-12" colspan="100">
    <h4 class="text-muted text-center ">
        No Record Found
    </h4>
</td>
<?php
}
?>
