baseURL=$('meta[name=baseURL]').attr("content");
nav=$('meta[name=nav]').attr("content");
$(document).ready(function () {
    $('.btnSubmit').click(function() {
        var tthis = this;
        var redirect=$(tthis).closest('form').attr('action');
        if(redirect=='submit-send-campaign'){
            $(tthis).attr('disabled','disabled');
        }
        $.ajax({
            url:baseURL+'req-'+redirect,
            type:'POST',
            data: $(this).closest('form').serializeArray()
        }).done(function(data){
            var data = JSON.parse(data);
            if(data==1 && redirect=='login'){
                if ($('#remember-me').is(':checked')) {
                    var username = $('#user-name').val();
                    var password = $('#user-password').val();
                    // set cookies to expire in 14 days
                    $.cookie('username', username, { expires: 14 });
                    $.cookie('password', password, { expires: 14 });
                    $.cookie('remember', true, { expires: 14 });
                }
                window.location=baseURL+"dashboard.html";
            }else if(data=='user-created'){
                $.toast({
                    heading: 'Success!',
                    text: 'User Created Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                setTimeout(function(){
                    resetFields();
                }, 1000);
            }else if(data=='user-updated'){
                $.toast({
                    heading: 'Success!',
                    text: 'User Updated Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                /*setTimeout(function(){
                    window.location.href=baseURL+"patients-list";
                }, 3000);*/
            }else if(data=='campaign-created'){
                $.toast({
                    heading: 'Success!',
                    text: 'Campaign Created Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                setTimeout(function(){
                    resetFields();
                }, 1000);
            }else if(data=='campaign-updated'){
                $.toast({
                    heading: 'Success!',
                    text: 'Campaign Updated Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
            }else if(data=='campaign-sent'){
                $.toast({
                    heading: 'Success!',
                    text: 'Campaign Sent Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                $(tthis).removeAttr('disabled');
            }else if(data=='country-created'){
                $.toast({
                    heading: 'Success!',
                    text: 'Country Created Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                setTimeout(function(){
                    resetFields();
                    $(tthis).removeAttr('disabled');
                }, 1000);

            }else if(data=='country-updated'){
                $.toast({
                    heading: 'Success!',
                    text: 'Country Updated Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
            }else if(data=='cnumber-created'){
                $.toast({
                    heading: 'Success!',
                    text: 'Campaign Number Created Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                setTimeout(function(){
                    resetFields();
                    $(tthis).removeAttr('disabled');
                }, 1000);

            }else if(data=='cnumber-updated'){
                $.toast({
                    heading: 'Success!',
                    text: 'Country Updated Successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
            }else{
                $.toast({
                    heading: 'Error!',
                    text: data,
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'error',
                    hideAfter: 3000,
                    stack: 1
                });
                $(tthis).removeAttr('disabled');
            }
        });
    });
    $('.delete').click(function(){
        var instance = this;
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url:baseURL+'req-'+$(instance).data('url'),
                        type:'POST',
                        data: {'rec-id':$(instance).data('id')}
                    }).done(function () {
                        /*swal("Deleted!", "Record has been deleted", "success")*/
                        swal({
                                title: "Deleted!",
                                text: "Record has been deleted",
                                type: "success"
                            },
                            function(){
                                window.location.reload();
                            });


                    });
                } else {
                    swal("Cancelled", "Your record is safe :)", "error");
                }
            });
    });
    //$('#username, #password').keypress(function(event){
    $('input[type="text"], input[type="password"]').keypress(function(event){
        if(event.keyCode == 13){
            $('.btnSubmit').trigger('click');
        }
    });
    $('.passRegen').click(function(){
        var tthis = this;
        swal({
            title: "Are you sure?",
            text: "Are you sure you want to change password?",
            type: "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-secondary ',
            confirmButtonClass: 'btn-danger',
            confirmButtonText: "Change Anyway!",
            closeOnConfirm: true
        }, function () {
            $.ajax({
                url:baseURL+'req-regenpass',
                type:'POST',
                data: {userid:$(tthis).data('userid')}
            }).done(function(data){
                $.toast({
                    heading: 'Success!',
                    text: 'Password changed and sent to user successfully!',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
            });
        });

    });
    $('.btnDelete').click(function() {
        var tthis = this;
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-secondary ',
            confirmButtonClass: 'btn-danger',
            confirmButtonText: "Delete Anyway!",
            closeOnConfirm: true
        }, function () {
            $.ajax({
                url:baseURL+$(tthis).data('req'),
                type:'POST',
                data: {id:$(tthis).data('id')}
            }).done(function(data){
                if(data){
                    swal({
                        title: "Thank You!",
                        text: "Your Record Has Been Deleted!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                }
            });
        });
    });

    /*$('#datetimepicker1').datetimepicker({
        format: 'MMM DD,YYYY HH:mm'
    });
    $("#formdatepicker").datetimepicker({
        /!*defaultDate: new Date(),*!/
        format: 'MMM DD,YYYY'
    });*/

    /*var href = document.location.href;
    var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
    alert(lastPathSegment);*/
   if(window.location.href == baseURL+'dashboard.html'){
        $('#main-menu-navigation li:nth-child(1)').addClass('active');
    }else if(window.location.href == baseURL+'listings.html'){
       $('#main-menu-navigation li:nth-child(2)').addClass('active');
    }else if(window.location.href == baseURL+'campaigns.html'){
       $('#main-menu-navigation li:nth-child(3)').addClass('active');
    }else if(window.location.href == baseURL+'inbox.html'){
       $('#main-menu-navigation li:nth-child(4)').addClass('active');
    }else if(window.location.href == baseURL+'outbox.html'){
       $('#main-menu-navigation li:nth-child(5)').addClass('active');
    }else if(window.location.href == baseURL+'countries.html'){
       $('#main-menu-navigation li:nth-child(6)').addClass('active');
    }else if(window.location.href == baseURL+'users.html'){
       $('#main-menu-navigation li:nth-child(8)').addClass('active');
    }else if(window.location.href == baseURL+'campaign-numbers.html'){
       $('#main-menu-navigation li:nth-child(7)').addClass('active');
    }else{
        if(nav=='listings.html') {
            $('#main-menu-navigation li:nth-child(2)').addClass('active');
        }else if(nav=='users.html') {
            $('#main-menu-navigation li:nth-child(8)').addClass('active');
        }else if(nav=='campaigns.html') {
            $('#main-menu-navigation li:nth-child(3)').addClass('active');
        }else if(nav == 'countries.html'){
            $('#main-menu-navigation li:nth-child(6)').addClass('active');
        }else if(nav == 'campaign-numbers.html'){
            $('#main-menu-navigation li:nth-child(7)').addClass('active');
        }
    }
/*
    $('#messageText').simplyCountable({
        counter:            '#msgWordCounter',
        countType:          'characters',
        maxCount:           parseInt($('#msgSmsCounter').html()),
        strictMax:          true,
        countDirection:     'up',
        safeClass:          'safe',
        overClass:          'over',
        thousandSeparator:  ',',
        onOverCount:        function(count, countable, counter){

        },
        onSafeCount:        function(count, countable, counter){

        },
        onMaxCount:         function(count, countable, counter){

        }
    });*/

    $('#selectCountryCampaign').change(function(){
        $('#cNumDiv').html('');
        if($('option:selected',this).val()==''){
            return false;
        }
        $.ajax({
            url:baseURL+'req-get-numbers-campaign-by-listing',
            type:'POST',
            data: {listingId:$('option:selected',this).val()}
        }).done(function(data){
            if(data){
                var data = JSON.parse(data);
                var html = '';
                if(data || data!=''){
                    $.each( data, function( key, value ) {
                        html += '<fieldset class="campaign-numbers"> CLI:';
                        html += '<label class="custom-control custom-radio">';
                        html += '<input id="radioStacked1" name="cNumber" type="radio" class="custom-control-input" onclick="getNumId('+value.n_id+')" value="'+value.n_number+'">';
                        html += '<span class="custom-control-indicator"></span>';
                        html += '<span class="custom-control-description">'+value['n_number']+'</span>';
                        html += '</label>';
                        html += '</fieldset>';
                    });
                    $('#cNumDiv').html(html);
                }
            }
        });
    });
});
function resetFields(){
    $('input[type="text"], textarea, select').val('');
}
function getNumId(a){
    $('#cNumId').val(a);
}
