<style>
    ul.counter_list {
        padding: 0;
        margin: 0;
        font-size: 12px;
        font-weight: 600;
        float: right;
    }

    ul.counter_list li {
        display: inline-block;
    }
    .campaign-numbers{
        /*width: 20% !important;*/
        display: inline-block;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <?php
                if(empty($campaignId) && empty($sendBit)){
                    $t = 'Add';
                }else if(!empty($campaignId) && empty($sendBit)){
                    $t = 'Edit';
                }else if(!empty($campaignId) && !empty($sendBit)){
                    $t = 'Send';
                }
                ?>
                <h3 class="content-header-title"><?php echo $t;?> Campaign</h3>
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
                            <form action="<?php echo (empty($sendBit)?'submit-campaign':'submit-send-campaign'); ?>">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <?php echo (!empty($campaignId)?'<input type="hidden" name="campaignId" value="'.$campaignId.'" />':''); ?>
                                                <fieldset>
                                                    <h5>Campaign Name</h5>
                                                    <div class="form-group">
                                                        <input class="form-control" name="cName" rows="10" placeholder="Campaign Name" value="<?php echo (!empty($cData['c_name'])?$cData['c_name']:''); ?>" <?php echo (!empty($sendBit)?'readonly':''); ?> autofocus/>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h5>Message</h5>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="cMessage" id="messageText" rows="10" placeholder="Message Body Here" <?php echo (!empty($sendBit)?'readonly':''); ?>>
                                                            <?php echo (!empty($cData['c_body'])?trim($cData['c_body']):''); ?>
                                                        </textarea>
                                                        <ul class="counter_list">
                                                            <li id="msgCharCounter">0</li> /
                                                            <li id="msgSmsCounter">1377</li>,
                                                            <li><span id="smscounter">0</span> SMS</li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                                <?php if(empty($sendBit)): ?>
                                                    <div class="text-right">
                                                        <button type="button" class="btnSubmit btn btn-success">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo (empty($sendBit)?'</form>':''); ?>
                                <?php if(!empty($sendBit)): ?>
                                <hr/>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <fieldset class="form-group">
                                                    <label for="countrySelect">Select List</label>
                                                    <select class="form-control" name="listingId" id="selectCountryCampaign">
                                                        <option selected="selected" value="">Select list</option>
                                                        <?php
                                                        if(!empty($listings)):
                                                            $b=0;
                                                            while($b<sizeof($listings)):
                                                                echo '<option value="'.encodeData($listings[$b]['ls_id']).'">'.$listings[$b]['ls_name'].'-'.$listings[$b]['country_name'].'</option>';
                                                                $b++;
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </fieldset>
                                                <input id="cNumId" type="hidden" name="cNumId" value="" />
                                                <div id="cNumDiv"></div>
                                                <div class="text-right">
                                                    <button type="button" class="btnSubmit btn btn-success">Send <i class="fa fa-paper-plane position-right"></i></button>
                                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>
</section>
</div>
</div>
</div>
<script>
    function smsCounter(count){
        if(parseInt(count)<=parseInt($('#msgSmsCounter').html())){
            $('#msgCharCounter').html(count);
            if(parseInt(count)<1){
                $('#smscounter').html(0);
            }
            if(parseInt(count)>=1 && parseInt(count)<=160){
                $('#smscounter').html(1);
            }
            if(parseInt(count)>160){
                $('#smscounter').html(2);
            }
            if(parseInt(count)>306){
                $('#smscounter').html(3);
            }
            if(parseInt(count)>459){
                $('#smscounter').html(4);
            }
            if(parseInt(count)>612){
                $('#smscounter').html(5);
            }
            if(parseInt(count)>765){
                $('#smscounter').html(6);
            }
            if(parseInt(count)>918){
                $('#smscounter').html(7);
            }
            if(parseInt(count)>1071){
                $('#smscounter').html(8);
            }
            if(parseInt(count)>1224){
                $('#smscounter').html(9);
            }
        }else{
            this.value = this.value.substring(0, parseInt($('#msgSmsCounter').html()));
        }
    }
    $(document).ready(function(){
        $('textarea#messageText').html($('textarea#messageText').html().trim());

        smsCounter($('textarea#messageText').val().length);
        $('#messageText').keyup(function(){
            smsCounter($(this).val().length);
            //console.log(parseInt($(this).val().length));
            /*if(parseInt($(this).val().length)<=parseInt($('#msgSmsCounter').html())){
                $('#msgCharCounter').html($(this).val().length);
                if(parseInt($(this).val().length)<1){
                    $('#smscounter').html(0);
                }
                if(parseInt($(this).val().length)>=1 && parseInt($(this).val().length)<=160){
                    $('#smscounter').html(1);
                }
                if(parseInt($(this).val().length)>160){
                    $('#smscounter').html(2);
                }
                if(parseInt($(this).val().length)>306){
                    $('#smscounter').html(3);
                }
                    if(parseInt($(this).val().length)>459){
                    $('#smscounter').html(4);
                }
                if(parseInt($(this).val().length)>612){
                    $('#smscounter').html(5);
                }
                if(parseInt($(this).val().length)>765){
                    $('#smscounter').html(6);
                }
                if(parseInt($(this).val().length)>918){
                    $('#smscounter').html(7);
                }
                if(parseInt($(this).val().length)>1071){
                    $('#smscounter').html(8);
                }
                if(parseInt($(this).val().length)>1224){
                    $('#smscounter').html(9);
                }
            }else{
                this.value = this.value.substring(0, parseInt($('#msgSmsCounter').html()));
            }*/
        });

    });

</script>