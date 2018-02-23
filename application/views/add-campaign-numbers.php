<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title"><?php echo (empty($numberId)?'Add':'Edit');?> Campaign Number</h3>
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
                                            <form action="add-campaign-numbers">
                                                <?php echo (!empty($numberId)?'<input type="hidden" name="numberId" value="'.$numberId.'" />':''); ?>
                                                <fieldset>
                                                    <h5>Country</h5>
                                                    <div class="form-group">
                                                        <select class="form-control" name="country" />
                                                        <option value="" <?php echo (empty($numberId)?'selected':''); ?>>Please Select</option>
                                                        <?php
                                                        if(!empty($countries)):
                                                            foreach ($countries as $c):
                                                                if($cNumberdata['fk_countryId']==$c['c_id']):
                                                                    echo '<option value="'.$c['c_id'].'" selected>'.$c['country_name'].'</option>';
                                                                    else:
                                                                        echo '<option value="'.$c['c_id'].'">'.$c['country_name'].'</option>';
                                                                endif;

                                                            endforeach;
                                                        endif;
                                                        ?>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h5>Campaign Number</h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="cNumber" name="cNumber" placeholder="Enter Campaign Number" value="<?php echo (!empty($cNumberdata['n_number'])?$cNumberdata['n_number']:''); ?>" />
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