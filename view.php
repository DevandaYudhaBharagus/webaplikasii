<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="custom" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Penilaian</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['no']) ? urlencode($data['no']) : null);
                        $counter++;
                        ?>
                        <div  id="page-report-body" class="">
                            <div class="detail-list td-no">
                                <div class="row">
                                    <div class="col-sm-3">
                                        No
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $data['no']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-no_kk">
                                <div class="row">
                                    <div class="col-sm-3">
                                        No Kk
                                    </div>
                                    <div class="col-sm-9">
                                        <span  data-value="<?php echo $data['no_kk']; ?>" 
                                            data-pk="<?php echo $data['no'] ?>" 
                                            data-url="<?php print_link("penilaian/editfield/" . urlencode($data['no'])); ?>" 
                                            data-name="no_kk" 
                                            data-title="Enter No Kk" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo $data['no_kk']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-nama">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Nama
                                    </div>
                                    <div class="col-sm-9">
                                        <span  data-value="<?php echo $data['nama']; ?>" 
                                            data-pk="<?php echo $data['no'] ?>" 
                                            data-url="<?php print_link("penilaian/editfield/" . urlencode($data['no'])); ?>" 
                                            data-name="nama" 
                                            data-title="Enter Nama" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo $data['nama']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-nilai">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Nilai
                                    </div>
                                    <div class="col-sm-9">
                                        <span  data-value="<?php echo $data['nilai']; ?>" 
                                            data-pk="<?php echo $data['no'] ?>" 
                                            data-url="<?php print_link("penilaian/editfield/" . urlencode($data['no'])); ?>" 
                                            data-name="nilai" 
                                            data-title="Enter Nilai" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo $data['nilai']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-rangking">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Rangking
                                    </div>
                                    <div class="col-sm-9">
                                        <span  data-value="<?php echo $data['rangking']; ?>" 
                                            data-pk="<?php echo $data['no'] ?>" 
                                            data-url="<?php print_link("penilaian/editfield/" . urlencode($data['no'])); ?>" 
                                            data-name="rangking" 
                                            data-title="Enter Rangking" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo $data['rangking']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="fa fa-ban"></i> No Record Found
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
