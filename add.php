<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Data Penduduk</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="data_penduduk-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("data_penduduk/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="no_kk">No Kk <span class="text-danger">*</span></label>
                                    <div id="ctrl-no_kk-holder" class=""> 
                                        <input id="ctrl-no_kk"  value="<?php  echo $this->set_field_value('no_kk',""); ?>" type="number" placeholder="Enter No Kk" step="1"  required="" name="no_kk"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div id="ctrl-nama_lengkap-holder" class=""> 
                                            <input id="ctrl-nama_lengkap"  value="<?php  echo $this->set_field_value('nama_lengkap',""); ?>" type="text" placeholder="Enter Nama Lengkap"  required="" name="nama_lengkap"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                            <div id="ctrl-tempat_lahir-holder" class=""> 
                                                <input id="ctrl-tempat_lahir"  value="<?php  echo $this->set_field_value('tempat_lahir',""); ?>" type="text" placeholder="Enter Tempat Lahir"  required="" name="tempat_lahir"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="tanggal_lahir">Tanggal Lahir </label>
                                                <div id="ctrl-tanggal_lahir-holder" class="input-group"> 
                                                    <input id="ctrl-tanggal_lahir" class="form-control datepicker  datepicker"  value="<?php  echo $this->set_field_value('tanggal_lahir',format_date('Y-m-d ')); ?>" type="datetime" name="tanggal_lahir" placeholder="Enter Tanggal Lahir" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="Y-m-d" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                                    <div id="ctrl-jenis_kelamin-holder" class=""> 
                                                        <input id="ctrl-jenis_kelamin"  value="<?php  echo $this->set_field_value('jenis_kelamin',""); ?>" type="text" placeholder="Enter Jenis Kelamin"  required="" name="jenis_kelamin"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="alamat">Alamat <span class="text-danger">*</span></label>
                                                        <div id="ctrl-alamat-holder" class=""> 
                                                            <input id="ctrl-alamat"  value="<?php  echo $this->set_field_value('alamat',""); ?>" type="text" placeholder="Enter Alamat"  required="" name="alamat"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                        <div class="form-ajax-status"></div>
                                                        <button class="btn btn-primary" type="submit">
                                                            Submit
                                                            <i class="fa fa-send"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
