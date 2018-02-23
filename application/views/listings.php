<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Listings</h3>
            </div>
            <div class="content-header-left col-md-6 col-12 mb-1">
                <a data-toggle="modal" data-target="#inlineForm" href="javascript:;" class="btn btn-primary btn-min-width mr-1 mb-1 float-right">Add List</a>
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
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($listings)):
                                            $a=0;
                                            while($a<sizeof($listings)): ?>
                                        <tr>
                                            <td><?php echo $a+1; ?></td>
                                            <td><?php echo $listings[$a]['ls_name']; ?></td>
                                            <td><?php echo $listings[$a]['country_name']; ?></td>
                                            <td><?php echo $listings[$a]['createdatetime']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'list.html/'.encodeData($listings[$a]['ls_id']); ?>">
                                                    <i class="ft-menu"></i>
                                                </a>
                                                |
                                                <a href="javascript:;" class="delete" data-url="delete-listings" data-id="<?php echo encodeData($listings[$a]['ls_id']); ?>">
                                                    <i class="ft-trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            $a++;
                                        endwhile;
                                        endif;
                                        ?>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Date</th>
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

<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="myModalLabel33">Add Lists</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php base_url(); ?>req-submit-listing" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Country: </label>
                    <div class="form-group">
                        <select id="issueinput5" name="country" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Select Country" data-original-title="" title="">
                            <?php
                            if(!empty($countries)){
                                $x=0;
                                while($x < sizeof($countries)){
                                    echo '<option value="'.$countries[$x]['country_name'].'">'.$countries[$x]['country_name'].' ('.$countries[$x]['country_code'].')</option>';
                                    $x++;
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <label>Name: </label>
                    <div class="form-group">
                        <input type="text" name="listName" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Enter List Name" required/>
                    </div>


                    <label>Upload List: </label>
                    <div class="form-group">
                        <label id="projectinput7" class="file center-block">
                            <input data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Upload List" id="userfile" name="userfile" type="file" required>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                    <input type="submit" class="btn btn-outline-primary btn-lg" value="Upload">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var successMsg = '<?= $this->session->flashdata('success_msg'); ?>';
    var invalid_numbers = '<?= $this->session->flashdata('invalid_numbers'); ?>';
    $(document).ready(function(){
        if(successMsg!=''){
            $.toast({
                heading: 'Success!',
                text: successMsg,
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'success',
                hideAfter: 3000,
                stack: 1
            });
        }
        if(invalid_numbers!=''){
            var inn = '';
            var iiv = JSON.parse(invalid_numbers);
            $.each( iiv, function( key, value ) {
                /*alert(value.l_name);*/
                inn += 'Name: '+value.l_name+'<br/>'+' Number: '+value.l_phone+'<br/>';
            });
            /*for(var i=0; i<=iiv.length; i++){
             inn = 'Name: '+iiv.l_name+'<br/>'+' Number: '+iiv.l_phone;
            }*/
            $.toast({
                heading: 'Invalid Numbers',
                text: inn,
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'error',
                hideAfter: false,
                stack: 1
            });
        }

    })
</script>