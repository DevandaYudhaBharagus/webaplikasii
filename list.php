<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="grid" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Penilaian</h4>
                </div>
                <div class="col-md-12 comp-grid">
                    <div class="">
                        <!-- Page bread crumbs components-->
                        <?php
                        if(!empty($field_name) || !empty($_GET['search'])){
                        ?>
                        <hr class="sm d-block d-sm-none" />
                        <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                            <ul class="breadcrumb m-0 p-1">
                                <?php
                                if(!empty($field_name)){
                                ?>
                                <li class="breadcrumb-item">
                                    <a class="text-decoration-none" href="<?php print_link('penilaian'); ?>">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                </li>
                                <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                    <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                </li>
                                <?php 
                                }   
                                ?>
                                <?php
                                if(get_value("search")){
                                ?>
                                <li class="breadcrumb-item">
                                    <a class="text-decoration-none" href="<?php print_link('penilaian'); ?>">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-capitalize">
                                    Search
                                </li>
                                <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                        <!--End of Page bread crumbs components-->
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class=" animated fadeIn page-content">
                        <div id="penilaian-list-records">
                            <?php
                            if(!empty($records)){
                            ?>
                            <div id="page-report-body">
                                <div class="row sm-gutters page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <!--record-->
                                    <?php
                                    $counter = 0;
                                    foreach($records as $data){
                                    $rec_id = (!empty($data['no']) ? urlencode($data['no']) : null);
                                    $counter++;
                                    ?>
                                    <div class="col-sm-4">
                                        <div class="bg-light p-2 mb-3 animated bounceIn">
                                            <div class="mb-2">  
                                                <span class="font-weight-light text-muted d-block">
                                                    ID
                                                </span>
                                            <?php echo $data['no']; ?></div>
                                            <div class="mb-2">  
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
                                                    <span class="font-weight-light text-muted d-block">
                                                        No Kartu keluarga
                                                    </span>
                                                    <?php echo $data['no_kk']; ?> 
                                                </span>
                                            </div>
                                            <div class="mb-2">  
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
                                                    <span class="font-weight-light text-muted d-block">
                                                        Nama
                                                    </span>
                                                    <?php echo $data['nama']; ?> 
                                                </span>
                                            </div>
                                            <div class="mb-2">  
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
                                                    <span class="font-weight-light text-muted d-block">
                                                        Nilai
                                                    </span>
                                                    <?php echo $data['nilai']; ?> 
                                                </span>
                                            </div>
                                            <div class="mb-2">  
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
                                                    <span class="font-weight-light text-muted d-block">
                                                        Rangking
                                                    </span>
                                                    <?php echo $data['rangking']; ?> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <!--endrecord-->
                                </div>
                                <div class="row sm-gutters search-data" id="search-data-<?php echo $page_element_id; ?>"></div>
                                <div>
                                </div>
                            </div>
                            <?php
                            if($show_footer == true){
                            ?>
                            <div class=" border-top mt-2">
                                <div class="row justify-content-center">    
                                    <div class="col-md-auto">   
                                    </div>
                                    <div class="col">   
                                        <?php
                                        if($show_pagination == true){
                                        $pager = new Pagination($total_records, $record_count);
                                        $pager->route = $this->route;
                                        $pager->show_page_count = true;
                                        $pager->show_record_count = true;
                                        $pager->show_page_limit =true;
                                        $pager->limit_count = $this->limit_count;
                                        $pager->show_page_number_list = true;
                                        $pager->pager_link_range=5;
                                        $pager->render();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            }
                            else{
                            ?>
                            <div class="text-muted  animated bounce p-3">
                                <h4><i class="fa fa-ban"></i> No record found</h4>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
