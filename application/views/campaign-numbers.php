<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Campaign Numbers</h3>
            </div>
            <div class="content-header-left col-md-6 col-12 mb-1">
                <a href="<?php echo base_url().'add-campaign-number.html'; ?>" class="btn btn-primary btn-min-width mr-1 mb-1 float-right">Add Campaign Number</a>
            </div>
        </div>

        <div class="content-body">

            <!-- File export table -->
            <section id="dom">
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
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Country Name</th>
                                            <th>Country Number</th>
                                            <th>Create D/T</th>
                                            <th>Update D/T</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(!empty($cNumdata)):
                                            $x=0;
                                            while($x < sizeof($cNumdata)) {
                                                $a=$x+1;
                                                echo '<tr>
                                                    <td>'.$a.'</td>
                                                    <td>'.$cNumdata[$x]['country_name'].'</td>
                                                    <td>'.$cNumdata[$x]['n_number'].'</td>
                                                    <td>'.$cNumdata[$x]['createdatetime'].'</td>
                                                    <td>'.$cNumdata[$x]['updatedatetime'].'</td>
                                                    <td>
                                                        <a href="'.base_url().'edit-campaign-number.html/'.encodeData($cNumdata[$x]['n_id']).'">
                                                            <i class="ft-edit"></i>
                                                        </a>
                                                        |
                                                        <a href="javascript:;" class="delete" data-url="delete-campaign-numbers" data-id="'.encodeData($cNumdata[$x]['n_id']).'">
                                                            <i class="ft-trash-2"></i>
                                                        </a>
                                                    </td>
                                                </tr>';
                                                $x++;
                                            }
                                        endif;
                                        ?>

                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Country Name</th>
                                            <th>Country Number</th>
                                            <th>Create D/T</th>
                                            <th>Update D/T</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- File export table -->
        </div>
    </div>
</div>