<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title"><?php echo (empty($countryId)?'Add':'Edit');?> Country</h3>
            </div>
        </div>
        <div class="content-body">
            <section class="inputmask" id="inputmask">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <form action="add-countries">
                                                <?php echo (!empty($countryId)?'<input type="hidden" name="countryId" value="'.$countryId.'" />':''); ?>
                                                <fieldset>
                                                    <h5>Country Name</h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="cName"  name="cName" placeholder="Enter Country Name" value="<?php echo (!empty($countrydata['country_name'])?$countrydata['country_name']:''); ?>" />
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h5>Country Code</h5>
                                                    <div class="form-group">
                                                        <span style="font-size: 30px;">+</span><input style="float:right; width: 98%;" type="text" class="form-control" id="cCode" name="cCode" placeholder="Enter Country Code" value="<?php echo (!empty($countrydata['country_code'])?str_replace('+','',$countrydata['country_code']):''); ?>" />
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h5>Number Length</h5>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="noLength" name="noLength" placeholder="Enter Number Length" value="<?php echo (!empty($countrydata['number_length'])?$countrydata['number_length']:''); ?>" />
                                                    </div>
                                                </fieldset>
                                                <div class="text-right">
                                                    <button type="button" class="btnSubmit btn btn-success">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>