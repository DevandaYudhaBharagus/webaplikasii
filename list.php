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
<section class="page ajax-page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="grid" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="py-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Data Penduduk</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("data_penduduk/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Tambah Data Penduduk 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('data_penduduk'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
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
                                        <a class="text-decoration-none" href="<?php print_link('data_penduduk'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('data_penduduk'); ?>">
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
                            <div id="data_penduduk-list-records">
                                <?php
                                if(!empty($records)){
                                ?>
                                <div id="page-report-body">
                                    <?php Html::ajaxpage_spinner(); ?>
                                    <div class="row sm-gutters page-data" id="page-data-<?php echo $page_element_id; ?>">
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
                                            $pager->ajax_page = true;
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
