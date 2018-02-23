<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Users</h3>
            </div>
            <div class="content-header-left col-md-6 col-12 mb-1">
                <a href="<?php echo base_url().'add-user.html'; ?>" class="btn btn-primary btn-min-width mr-1 mb-1 float-right">Add User</a>
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
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if(!empty($users)):
                                        $x=0;
                                        while($x < sizeof($users)) {
                                            $a=$x+1;
                                            echo '<tr>
                                                    <td>'.$a.'</td>
                                                    <td>'.$users[$x]['u_name'].'</td>
                                                    <td>'.$users[$x]['u_email'].'</td>
                                                    <td>'.$users[$x]['createdatetime'].'</td>
                                                    <td>
                                                        <a href="'.base_url().'edit-user.html/'.encodeData($users[$x]['u_id']).'">
                                                            <i class="ft-edit"></i>
                                                        </a>
                                                        |
                                                        <a href="javascript:;" class="delete" data-url="delete-users" data-id="'.encodeData($users[$x]['u_id']).'">
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
                                            <th>Name</th>
                                            <th>Email</th>
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