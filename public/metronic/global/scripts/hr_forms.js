    var url=$('.main_url').val();
    var csrf=$('.csrf').val();
$(".saveMultipleLeave").click(function() {

        var inputID = $('#saveMultipleLeaveForm').validate({
          rules:{
            leave_title:{ required: true  },
            leave_type:{ required: true },
            leave_to:{ required: true },
            leave_from:{ required: true },
            leave_comment:{ required: true  },
            leaveSelect : { required: true  }
            },

            messages:{
              leave_title:{ required: 'Title required' },
              leave_type:{ required: '' },
              leave_to:{ required: 'To date required' },
              leave_from:{ required: 'From date required' },
              leave_comment:{ required: 'Comment required' },
              leaveSelect : { required: '' }            
            }
          
        });

          inputID.form();

          if($('#saveMultipleLeaveForm').valid()){
              bootbox.dialog({
                message: "Are you sure you want to save multiple leave?",
                title: "Please Confirm.",
                buttons: {
                    confirm: {
                        label: "Yes! Save Leaves",
                        callback: function () {
                           var staff_ids = $('.leaveSelect').val();

                           for (var i = 0; i < staff_ids.length; i++) {

                               $("#multiple_limit").bootstrapSwitch();
                               var paid_compensation = $('#multiple_limit').bootstrapSwitch('state'); //returns true or false
                               if (paid_compensation == true) {
                                   paid_compensation = 1;
                               } else {
                                   paid_compensation = 0;
                               }

                               var staffID = staff_ids[i];

                               var leave_title = $('#multiple_leave_title').val();
                               var leave_type = $('.multiple_leave_type option:selected').val();
                               var leave_from = $('#multiple_leave_from').val();
                               var leave_to = $('#multiple_leave_to').val();
                               var leave_comment = $('#multiple_leave_comment').val();

                               var paid_compensation_display;
                               if (paid_compensation == 1) {
                                   paid_compensation_display = 'Yes';
                               } else {
                                   paid_compensation_display = 'No';
                               }


                               if (leave_type != '' && leave_title != '' && leave_from != '' && leave_to != '') {

                                   $.ajax({
                                       type: "POST",
                                       cache: true,
                                       url: url+'/masterLayout/staff/addLeave',
                                       data: {
                                           "staff_id": staffID,
                                           "leave_title": leave_title,
                                           "leave_type": leave_type,
                                           "leave_from": leave_from,
                                           "leave_to": leave_to,
                                           "leave_comment": leave_comment,
                                           "paid_compensation": paid_compensation,
                                           "_token": csrf
                                       },
                                       success: function(result) {

                                         reloadLeavesTable();
                                         resetEntryForm();
                                         reloadLogsTable();
                                       }

                                   });
                               }
                           }
                           $('#ProcessEntry').modal('toggle'); 
                        }
                    },
                    cancel: {
                        label: "Cancel",
                        callback: function () {}
                    },

                }
              });         
          }
       
    });
   $(".saveMultipleAbsentia").click(function() {
    

        var inputID = $('#saveMultipleAbsentiaForm').validate({
          rules:{
            absentia_title:{ required: true  },
            absentia_date:{ required: true },
            absentia_startTime:{ required: true },
            absentia_endTime:{ required: true },
            absentia_description:{ required: true }
            },

            messages:{
              absentia_title:{ required: 'Title required' },
              absentia_date:{ required: 'Date required' },
              absentia_startTime:{ required: 'Start time required' },
              absentia_endTime:{ required: 'End time required' },
              absentia_description:{ required: 'Description required' }       
            }
          
        });

        inputID.form();

        if($('#saveMultipleAbsentiaForm').valid()){
            bootbox.dialog({
                message: "Are you sure you want to save multiple absentia?",
                title: "Please Confirm.",
                buttons: {
                    confirm: {
                        label: "Yes! Save Absentia",
                        callback: function () {
                            var staff_ids = $('.absentiaSelect').val();

                            for (var i = 0; i < staff_ids.length; i++) {


                                 var date = $("#multiple_absentia_date").val();
                                 var title = $("#multiple_absentia_title").val();
                                 var start_time = $("#multiple_absentia_startTime").val();
                                 var end_time = $("#multiple_absentia_endTime").val();
                                 var description = $("#multiple_absentia_description").val();
                                 var staffID = staff_ids[i];
                                 if (date !== '' && title !== '' && start_time !== '' && end_time !== '') {

                                     $.ajax({
                                         type: "POST",
                                         cache: true,
                                         url: url+'/masterLayout/staff/addAbsentia',
                                         data: {
                                             "staff_id": staffID,
                                             "date": date,
                                             "title": title,
                                             "start_time": start_time,
                                             "end_time": end_time,
                                             "description": description,
                                             "_token": csrf
                                         },
                                         success: function(result) {

                                            reloadAbsentiaTable();
                                            resetEntryForm();
                                            reloadLogsTable();
                                         }
                                     });
                                 }
                            }

                            $('#ProcessEntry').modal('toggle');                       
                          }
                    },
                    cancel: {
                        label: "Cancel",
                        callback: function () {}
                    },

                }
            });
        }    
    
   });


   $(".saveMultiplePenalty").click(function() {


        var inputID = $('#saveMultiplePenaltyForm').validate({
          rules:{
            penalty_title:{ required: true  },
            penalty_day:{ required: true },
            penalty_from:{ required: true },
            penalty_to:{ required: true  },
            penalty_description : { required: true  }
            },
            messages:{
              penalty_title:{ required: 'Title required' },
              penalty_day:{ required: 'Day required' },
              penalty_from:{ required: 'From date required' },
              penalty_to:{ required: 'To date required' },
              penalty_description:{ required: 'Description required' }            
            }
          
          });

          inputID.form();

          if($('#saveMultiplePenaltyForm').valid()){
              bootbox.dialog({
                message: "Are you sure you want to save multiple penalty?",
                title: "Please Confirm.",
                buttons: {
                    confirm: {
                        label: "Yes! Save Penalty",
                        callback: function () {
                           var staff_ids = $('.selectPenalty').val();

                           for (var i = 0; i < staff_ids.length; i++) {

                               var penalty_title = $('#multiple_penalty_title').val();
                               var penalty_day = $('#multiple_penalty_day').val();
                               var penalty_from = $('#multiple_penalty_from').val();
                               var penalty_to = $('#multiple_penalty_to').val();
                               var penalty_description = $('#multiple_penalty_description').val();
                               var staff_id = staff_ids[i];
                               // console.log(penalty_to);

                               if (staff_id != '' && penalty_title != '' && penalty_from != '' && penalty_to != '' && penalty_day != '') {
                                   $.ajax({
                                       type: "POST",
                                       cache: true,
                                       url: url+'/masterLayout/addPenalty',
                                       data: {
                                           "penalty_title": penalty_title,
                                           "penalty_day": penalty_day,
                                           "penalty_from": penalty_from,
                                           "penalty_to": penalty_to,
                                           "penalty_description": penalty_description,
                                           "staff_id": staff_id,
                                           "_token": csrf
                                       },
                                       success: function(e) {
                                          reloadUnauthorizedAdjustmentTable();
                                          resetEntryForm();
                                          reloadLogsTable();

                                       }
                                   });
                               }
                           }
                           $('#ProcessEntry').modal('toggle');                     
                          }
                    },
                    cancel: {
                        label: "Cancel",
                        callback: function () {}
                    },

                }
            });
          }
       
   });

   $(".saveMultipleAdjustment").click(function() {
      
        var inputID = $('#saveMultipleAdjustmentForm').validate({
          rules:{
            adjustment_title:{ required: true  },
            adjustment_no:{ required: true },
            adjustment_description:{ required: true }
            },

            messages:{
              adjustment_title:{ required: 'Title required' },
              adjustment_no:{ required: 'No of days required' },
              adjustment_description:{ required: 'Description required' }           
            }
          
        });
        inputID.form();

        if($('#saveMultipleAdjustmentForm').valid()){ 
            bootbox.dialog({
              message: "Are you sure you want to save multiple exceptional adjustments?",
              title: "Please Confirm.",
              buttons: {
                  confirm: {
                      label: "Yes! Save Adjustments",
                      callback: function () {

                          var staff_ids = $('.selectAdjustments').val();

                          for (var i = 0; i < staff_ids.length; i++) {
                               var adjustment_title = $('#multiple_adjustment_title').val();
                               var adjustment_no = $('#multiple_adjustment_no').val();
                               var adjustment_description = $('#multiple_adjustment_description').val();
                               var staff_id = staff_ids[i];
                               if (adjustment_title != '' && adjustment_no != '') {
                                   $.ajax({
                                       type: "POST",
                                       cache: true,
                                       data: {
                                           "adjustment_title": adjustment_title,
                                           "adjustment_no": adjustment_no,
                                           "adjustment_description": adjustment_description,
                                           "staff_id": staff_id,
                                           "_token": "{{csrf_token()}}"
                                       },
                                       url: url+'/masterLayout/addAdjustment',
                                       success: function(e) {
                                          reloadExceptionAdjustmentTable();
                                          resetEntryForm();
                                          reloadLogsTable();
                                       }

                                   });
                               }
                          }
                          $('#ProcessEntry').modal('toggle');                    
                        }
                  },
                  cancel: {
                      label: "Cancel",
                      callback: function () {}
                  },

              }
            });
        }       
   });

   $(".saveMultipleManual").click(function() {


        var inputID = $('#saveMultipleManualForm').validate({
          rules:{
            manual_tap:{ required: true  },
            manual_description:{ required: true },
            manual_attendance:{ required: true }
            },

            messages:{
              manual_tap:{ required: 'Tap required' },
              manual_description:{ required: 'Description required' },
              manual_attendance:{ required: 'Attendance required' }           
            }
          
        });
        inputID.form();

        if($('#saveMultipleManualForm').valid()){ 
            bootbox.dialog({
              message: "Are you sure you want to save multiple missed tap?",
              title: "Please Confirm.",
              buttons: {
                  confirm: {
                      label: "Yes! Save Missed Tap",
                      callback: function () {

                         var staff_ids = $('.selectManual').val();

                         for (var i = 0; i < staff_ids.length; i++) {
                             var date = $("#multiple_manual_attendance").val();
                             var missTap = $("#multiple_manual_tap").val();

                             var description = $("#multiple_manual_description").val();
                             var staffID = staff_ids[i];

                             if (date != '' && missTap != '' && staffID != '') {
                                 $.ajax({
                                     type: "POST",
                                     cache: true,
                                     url: url+'/masterLayout/staff/addManual',
                                     data: {
                                         "staff_id": staffID,
                                         "date": date,
                                         "missTap": missTap,
                                         "description": description,
                                         "_token": csrf
                                     },
                                     success: function(result) {

                                          reloadMisstapTable();
                                          resetEntryForm();
                                          reloadLogsTable();
                          
                                     }

                                 });
                             }
                         }
                         $('#ProcessEntry').modal('toggle');                    
                      }
                  },
                  cancel: {
                      label: "Cancel",
                      callback: function () {}
                  },

              }
            });  
        }     
  

   });
   var reloadMisstapTable = function reloadMisstapTable(){
      var missTapTable = $(".missTapEventTableView");

        $.ajax({
            type: "POST",
            url : url+'/masterLayout/staff/getMisstap',
            data: {
            _token: csrf},
            dataType: "HTML",

            success: function(res){

                 reloadLogsTable();
                 missTapTable.html(res);

            },

            error:function(){}
        });
   } 
   var reloadExceptionAdjustmentTable = function reloadExceptionAdjustmentTable(){
      var adjustmentTable = $(".exceptionAdjustmentTableView");

        $.ajax({
            type: "POST",
            url : url+'/masterLayout/staff/getAdjustment',
            data: {
            _token: csrf},
            dataType: "HTML",

            success: function(res){
                 
                 adjustmentTable.html(res);

            },

            error:function(){}
        });
   } 
   var reloadUnauthorizedAdjustmentTable = function reloadUnauthorizedAdjustmentTable(){
      var unauthorizedTable = $(".adjustmentTableUnauthorizedLeavesView");

        $.ajax({
            type: "POST",
            url : url+'/masterLayout/staff/getUnauthorized',
            data: {
            _token: csrf},
            dataType: "HTML",

            success: function(res){
                 
                 unauthorizedTable.html(res);

            },

            error:function(){}
        });
   }  
   var reloadLeavesTable = function reloadLeavesTable(){
      var leavesTable = $(".adjustmentTableLeavesView");

        $.ajax({
            type: "POST",
            url : url+'/masterLayout/staff/getLeaves',
            data: {
            _token: csrf},
            dataType: "HTML",

            success: function(res){
                 
                 leavesTable.html(res);
            },

            error:function(){}
        });
   }          
   var reloadAbsentiaTable = function reloadAbsentiaTable(){
    
      var absentiaTable = $(".adjustmentTableAbsentiaView");

        $.ajax({
            type: "POST",
            url : url+'/masterLayout/staff/getAbsentia',
            data: {
            _token: csrf},
            dataType: "HTML",

            success: function(res){
                 absentiaTable.html(res);
                
            },

            error:function(){}
        });
   }
   var resetEntryForm = function resetEntryForm(){
      //Absentia Form Fields
      $("#multiple_absentia_date").val('');
      $("#multiple_absentia_title").val('');
      $("#multiple_absentia_startTime").val('');
      $("#multiple_absentia_endTime").val('');
      $("#multiple_absentia_description").val(''); 
      $(".absentiaSelect").val(null).trigger("change"); 

      //Leave Form Fields

      $('#multiple_leave_title').val('');
      $('.multiple_leave_type option').val('');
      $('#multiple_leave_from').val('');
      $('#multiple_leave_to').val('');
      $('#multiple_leave_comment').val('');
      $(".leaveSelect").val(null).trigger("change");

      //Adjustment Form Fields
      $('#multiple_adjustment_title').val('');
      $('#multiple_adjustment_no').val('');
      $('#multiple_adjustment_description').val(''); 
      $(".selectAdjustments").val(null).trigger("change");  

      //Penalty Form Fields
      $('#multiple_penalty_title').val('');
      $('#multiple_penalty_day').val('');
      $('#multiple_penalty_from').val('');
      $('#multiple_penalty_to').val('');
      $('#multiple_penalty_description').val(''); 
      $(".selectPenalty").val(null).trigger("change");

      //Manual Form Fields
      $("#multiple_manual_attendance").val('');
      $("#multiple_manual_tap").val('');
      $("#multiple_manual_description").val('');
      $(".selectManual").val(null).trigger("change");     
   }  
   var reloadLogsTable = function reloadLogsTable(){
      var logsTable = $(".logsTableView");

        $.ajax({
            type: "POST",
            url : url+'/masterLayout/staff/getLogs',
            data: {
            _token: csrf},
            dataType: "HTML",

            success: function(res){
                 
                 logsTable.html(res);

            },

            error:function(){}
        });
   }       
var edit_manual = function (ID) {

    var date = $("#manual_attendance_edit").val();
    var missTap = $("#manual_missTap_edit").val();
    var description = $("#manual_description_edit").val();
    var Manual_id = $('#manual_id_edit').val();
    var Tap_id = $('#tap_id_edit').val();
    var Missed_id = $('#Missed_id_edit').val();
    var Table_name = $('#Table_name_edit').val();
    var form_number_a=$('#form_number_miss_tap_a').val();
    var form_number_b=$('#form_number_miss_tap_b').val();
    var form_number=form_number_a+form_number_b;
    var pvs_form_no=$('.mis_pvs_form_no').val();

    if(pvs_form_no!=form_number_b){
      checkHrFormNumberExistance(form_number,'absenta_manual_description');
    }
    bootbox.dialog({
        message: "Are you sure you want to edit this Missed Tap?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Missed Tap",
                callback: function () {


                    if (date != '' && missTap != '' && Tap_id != '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: url+'/masterLayout/staff/OverRightAddManual',
                            data: {
                                "Manual_id": Manual_id,
                                "Tap_id": Tap_id,
                                "Missed_id": Missed_id,
                                "Table_name": Table_name,
                                "date": date,
                                "missTap": missTap,
                                "description": description,
                                "form_number": form_number,
                                "_token": csrf
                            },
                            success: function (result) {

                                $("#manual_description_"+Missed_id).text(description);
                                $("#manual_missTap_date_"+Missed_id).text(formatDate(new Date(date)));
                                $("#manual_time_"+Missed_id).text(format_time(missTap))
                                $('#misstap_modifiedOn_'+Missed_id).text(getModifiedDate())

                                $("#manual_attendance_edit").val('');
                                $("#manual_missTap_edit").val('');
                                $("#manual_description_edit").val('');
                                $('#ManualAttendanceFormEdit').modal('toggle');
                                reloadLogsTable();
                            }

                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}  
var editAddManual = function(ID,Missed_id,Table_name){
    $.ajax({
       type:"POST",
       cache:true,
       url:url+'/masterLayout/staff/editAddManual',
       data:{
       "ID":ID,
       "Missed_id":Missed_id,
       "Table_name":Table_name,
       "_token": csrf
       },
       success:function(res){
       $("#Manual_Form_Entry").html('');
       $("#Manual_Form_Entry").html(res);
       $("#manual_staff_view").html($('#manual_staff_view_'+Missed_id).html())
       $("#ManualAttendanceFormEdit").modal('toggle');
         createFormNumberMask();

       }
    });
}  
var editPenalty = function () {

    var penalty_title = $('#penalty_title_edit').val();
    var penalty_day = $('#penalty_day_edit').val();
    var penalty_from = $('#penalty_from_edit').val();
    var penalty_to = $('#penalty_to_edit').val();
    var penalty_description = $('#penalty_description_edit').val();

    var penalty_id_edit = $('#penalty_id_edit').val();
    var Staff_id = $('#staff_id_edit').val();
    var form_number_a=$('#form_number_penalty_a').val();
    var form_number_b=$('#form_number_penalty_b').val();
    var form_number=form_number_a+form_number_b;
    var pvs_form_no=$('.penalty_pvs_form_no').val();

      if(pvs_form_no!=form_number_b){
        checkHrFormNumberExistance(form_number,'daily_penalty');
      }

    // console.log(penalty_to);

    bootbox.dialog({
        message: "Are you sure you want to edit this Penalty?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Penalty",
                callback: function () {


                    if (penalty_id_edit != '' && penalty_title != '' && penalty_from != '' && penalty_to != '' && penalty_day != '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: url+'/masterLayout/staff/OverRightPenalties',
                            data: {
                                "penalty_id_edit": penalty_id_edit,
                                "form_number": form_number,
                                "Staff_id": Staff_id,
                                "penalty_title": penalty_title,
                                "penalty_day": penalty_day,
                                "penalty_from": penalty_from,
                                "penalty_to": penalty_to,
                                "penalty_description": penalty_description,
                                "_token": csrf
                            },
                            success: function (e) {
                              
                                $('#penalty_title_'+penalty_id_edit).text(penalty_title)
                                $('#penalty_from_'+penalty_id_edit).text(penalty_from)
                                $('#penalty_to_'+penalty_id_edit).text(penalty_to)
                                $('#penalty_description_'+penalty_id_edit).text(penalty_description)
                                $('#penalty_modifiedOn_'+penalty_id_edit).text(getModifiedDate())

                                $('#penalty_title_edit').val('');
                                $('#penalty_day_edit').val('');
                                $('#penalty_from_edit').val('');
                                $('#penalty_to_edit').val('');
                                $('#penalty_description_edit').val('');
                                $("#UnAuthLeavePenEdit").modal('toggle');
                                reloadLogsTable();
                                createFormNumberMask();

                            }
                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}  
var ReWriteLeavePenalties = function(ID){
    $.ajax({
       type:"POST",
       cache:true,
       url:url+'/masterLayout/staff/editPenalties',
       data:{
       "ID":ID,
       "_token": csrf
       },
       success:function(res){
       $("#Penalties_Contents").html("");
       $("#Penalties_Contents").html(res);
       $(".penalty_staff_view").html($('.penalty_staff_view_'+ID).html())
       $("#UnAuthLeavePenEdit").modal('toggle');
       createFormNumberMask();
       }
    });
}  
var editAdjustment = function () {

    var adjustment_title = $('#adjustment_title_edit').val();
    var adjustment_no = $('#adjustment_no_edit').val();
    var adjustment_description = $('#adjustment_description_edit').val();

    var adjustment_id = $('#adjustment_id_edit').val();
    var staff_id = $('#adjustment_staff_edit').val();
    var form_number_a=$('#form_number_exceptional_adjustment_a').val();
    var form_number_b=$('#form_number_exceptional_adjustment_b').val();
    var form_number=form_number_a+form_number_b;
    var pvs_form_no=$('.pvs_form_no_adj').val();
   if(pvs_form_no!=form_number_b){
        checkHrFormNumberExistance(form_number,'exception_adjustment');
   }
    bootbox.dialog({
        message: "Are you sure you want to edit this Adjustment?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Adjustment",
                callback: function () {

                    if (adjustment_title != '' && adjustment_no != '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            data: {
                                "form_number": form_number,
                                "adjustment_title": adjustment_title,
                                "adjustment_no": adjustment_no,
                                "adjustment_description": adjustment_description,
                                "staff_id": staff_id,
                                "adjustment_id": adjustment_id,
                                "_token": "{{csrf_token()}}"
                            },
                            url: url+'/masterLayout/staff/OverRightAdjustment',
                            success: function (e) {

                                $('#adjustment_staff_title_'+adjustment_id).text(adjustment_title)
                                $('#adjustment_staff_description_'+adjustment_id).text(adjustment_description)
                                $('#adjustment_staff_day_'+adjustment_id).text(adjustment_no)
                                $('#adjustment_modifiedOn_'+adjustment_id).text(getModifiedDate())


                                $('#adjustment_title_edit').val('');
                                $('#adjustment_no_edit').val('');
                                $('#adjustment_description_edit').val('');
                                $('#adjustment_id_edit').val('');
                                $('#adjustment_staff_edit').val('');
                                $('#ExceptionalAdjustmentFormEdit').modal('toggle');
                                createFormNumberMask();

                                reloadLogsTable();
                            }
                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}   
var ReWriteAdjustment = function(ID){
    $.ajax({
       type:"POST",
       cache:true,
       url:url+'/masterLayout/staff/editAdjustment',
       data:{
       "ID":ID,
       "_token": csrf
       },
       success:function(res){
       // var data = jQuery.parseJSON(res);
       $('.adjustment_staff_view').html($('.adjustment_staff_'+ID).html())
       $("#Adjustment_Contents").html('');
       $("#Adjustment_Contents").html(res);
       $("#ExceptionalAdjustmentFormEdit").modal('toggle');
       createFormNumberMask();
       }
    });
}  
var edit_leave = function () {


    $("#limit_edit").bootstrapSwitch();
    var paid_compensation = $('#limit_edit').bootstrapSwitch('state'); //returns true or false
    if (paid_compensation == true) {
        paid_compensation = 1;
    } else {
        paid_compensation = 0;
    }

    var Leave_Application_id = $('#Leave_Application_id').val();

    var staffID = $('#tab_1_3').data('staffID');
    var leave_title = $('#leave_title_edit').val();
    var leave_type = $('#Select_Leave_Type_edit option:selected').val();
    var leave_from = $('#leave_from_edit').val();
    var leave_to = $('#leave_to_edit').val();
    var leave_comment = $('#leave_comment_edit').val();


    var paid_compensation_percentage = $('#paid_percentage_edit').val();
    var leave_approve_status_edit = $('#leave_approve_status_edit').val();
    var approve_from = $('#leave_approve_date_from_edit').val();
    var approve_to = $('#leave_approve_date_to_edit').val();

    var form_number_a=$('#form_number_leave_application_a').val();
    var form_number_b=$('#form_number_leave_application_b').val();

    var form_number=form_number_a+form_number_b;
    var pvs_form_no=$('.leave_pvs_form_no').val();

    if(pvs_form_no!=form_number_b){
          checkHrFormNumberExistance(form_number,'leave_application');
    }

    var paid_compensation_display;
    if (paid_compensation == 1) {
        paid_compensation_display = 'Yes';
    } else {
        paid_compensation_display = 'No';
    }


    bootbox.dialog({
        message: "Are you sure you want to edit this Leaves?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Leaves",
                callback: function () {


                    if (leave_type != '' && leave_title != '' && leave_from != '' && leave_to != '') {

                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: url+'/masterLayout/staff/RWriteLeave',
                            data: {
                                "staff_id": staffID,
                                "Leave_Application_id": Leave_Application_id,
                                "leave_title": leave_title,
                                "leave_type": leave_type,
                                "leave_from": leave_from,
                                "leave_to": leave_to,
                                "leave_comment": leave_comment,
                                "paid_compensation": paid_compensation,
                                "form_number": form_number,
                                "_token": csrf
                            },
                            success: function (result) {
                                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                var d = new Date(leave_from);
                                leave_from = days[d.getDay()] + ", " + formatDate(new Date(leave_from));
                                var d = new Date(leave_to);
                                leave_to = days[d.getDay()] + ", " + formatDate(new Date(leave_to));

                                $('#leave_title_'+Leave_Application_id).text(leave_title)
                                $('#leave_startDate_'+Leave_Application_id).text(leave_from)
                                $('#leave_endDate_'+Leave_Application_id).text(leave_to)
                                $('#leave_description_'+Leave_Application_id).text(leave_comment)
                                $('#leave_compensation_'+Leave_Application_id).text((paid_compensation == 1) ? 'NO' : 'YES' )
                                $('#leave_modifiedOn_'+Leave_Application_id).text(getModifiedDate()) 
                                
                                $('#leave_table > tbody tr').each(function (index) {
                                    var $this = $(this);
                                    var filter = $this.attr('data-id');
                                    var id = Leave_Application_id;
                                    if (filter == id) {
                                        var leaveHTML = '';

                                        leaveHTML = leaveHTML + '<tr  class="approvedBorder" data-id=' + id + '><td>' + leave_title + '</small></td><td class=""><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested Compensation"></i>   ' + paid_compensation_display + ' </td></tr>';
                                        if (leave_approve_status_edit == 1) {
                                            leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved Compensation"></i>   ' + paid_compensation_percentage + '<span>% paid</span></td></tr>';
                                        }

                                        leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i>  ' + formatDate(leave_from) + '</td></tr>';

                                        if (leave_approve_status_edit == 1) {
                                            leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i>   ' + formatDate(approve_from) + ' </td></tr>';
                                        }

                                        leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested till"></i>   ' + formatDate(leave_to) + '</td></tr>';

                                        if (leave_approve_status_edit == 1) {
                                            leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved till"></i>  ' + formatDate(approve_to) + ' </td> </tr>';
                                        }

                                        //leaveHTML = leaveHTML + '</table></td><td>'+leave_comment+'</td><td class="text-center"><a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave('+id+')" ><i class="fa fa-check"></i></a></td></tr>';

                                        leaveHTML = leaveHTML + '</table></td><td>' + leave_comment + '</td><td class="text-center"><a onClick="ReWriteLeave(' + id + ')"><i class="fa fa-edit"></i></a> | <a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave(' + id + ')" ><i class="fa fa-check"></i></a> | <a onClick="delectLeave(' + id + ')"><i class="fa fa-close"></i></a></td></tr>';
                                        $(this).replaceWith(leaveHTML);
                                    }

                                });
                                $('#LeaveAppForEdit').modal('toggle');


                            }

                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}  
var ReWriteLeave = function(id){
     var update_id =  id;
     $.ajax({
         type:"POST",
         url:url+'/masterLayout/staff/ReWriteLeave',
         data:{
            "id":id,
            "_token": csrf
         },
         success:function(e){

          var data = JSON.parse(e);
         $('.leave_staff_view').html($('.leave_staff_'+id).html())
         $("#Leave_main_containter").html( data.LT );
         $('#LeaveAppForEdit').modal('toggle');
         
         var paid_percentage_edit = $("#paid_compensation_edit").val();
         createFormNumberMask();

         $("#limit_edit").bootstrapSwitch();
         
         if( paid_percentage_edit == 1){ 
            $("#limit_edit").bootstrapSwitch('state', true);
         }else{
            $("#limit_edit").bootstrapSwitch('state', false);
         }  
         
         
          



         }

     });
}
var Edit_Absentia = function(Absentia_id, Staff_id ){
    $(".absentia_staff_view").html($(".absentia_staff_"+Staff_id).html())
    $("#Edit_Absentia_id_hidden").val(Absentia_id);
    $("#Edit_Absentia_id_staff_id_hidden").val(Staff_id);

        if( Staff_id > 0 ){
            $.ajax({
               type:"POST",
               cache:true,
               url:url+'/masterLayout/staff/Edit_Get_Absentia',
               data:{
                "staff_id":Staff_id,
                "Absentia_id":Absentia_id,
                "_token": csrf
               },
               success:function(result){
              // var data = jQuery.parseJSON(result);
              $('#Absenia_Contents').html(result);
              $('#AddAIAE').modal('toggle');
                  createFormNumberMask();
                    
               }
            });
        }
}  
function format_time(time) {
  // formats a javascript Date object into a 12h AM/PM time string
  time = time.split(":");
  var hour = time[0];
  var minute =  time[1];
  var amPM = (hour > 11) ? "PM" : "AM";
  if(hour > 12) {
    hour -= 12;
  } else if(hour == 0) {
    hour = "12";
  }

  return hour + ":" + minute + " "+ amPM;
}   
var addAbsentiaE = function addAbsentiaE() {

    var Attendance_in_id = $("#Attendance_in_id").val();
    var Attendance_out_id = $("#Attendance_out_id").val();
    var Attendance_des_id = $("#Attendance_des_id").val();
    var Edit_Absentia_id_hidden = $("#Edit_Absentia_id_hidden").val();
    var Edit_Absentia_id_staff_id_hidden = $("#Edit_Absentia_id_staff_id_hidden").val();
    var date = $("#absentia_date_edit").val();
    var titles = $("#absentia_title_edit").val();
    var start_time = $("#absentia_startTime_edit").val();
    var end_time = $("#absentia_endTime_edit").val();
    var description = $("#absentia_description_edit").val();
    var staffID = Edit_Absentia_id_staff_id_hidden;
    var form_number_a=$('#form_number_absentia_a').val();
    var form_number_b=$('#form_number_absentia_b').val();
    var form_number=form_number_a+form_number_b;
    var pvs_form_no=$('.absentia_pvs_form_no').val();
    if(pvs_form_no!=form_number_b){
          checkHrFormNumberExistance(form_number,'absenta_manual_description');
    }

    bootbox.dialog({
        message: "Are you sure you want to change this Absentia?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Change Absentia",
                callback: function() {
                    if (Attendance_in_id !== '' && Attendance_out_id !== '' && Attendance_des_id !== '' && end_time !== '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: url+'/masterLayout/staff/editAbsentia',
                            data: {
                                "staff_id": staffID,
                                "form_number": form_number,
                                "date": date,
                                "title": titles,
                                "start_time": start_time,
                                "end_time": end_time,
                                "description": description,
                                "Attendance_in_id": Attendance_in_id,
                                "Attendance_out_id": Attendance_out_id,
                                "Attendance_des_id": Attendance_des_id,
                                "Edit_Absentia_id_hidden": Edit_Absentia_id_hidden,
                                "_token": csrf
                            },
                            success: function(result) {


                                    $('#absentia_title_'+Edit_Absentia_id_hidden).text(titles);
                                    $('#absentia_aiaStamp_'+Edit_Absentia_id_hidden).text( formatDate(new Date(date)));
                                    $('#absentia_aiaStart_time_'+Edit_Absentia_id_hidden).text(format_time(start_time));
                                    $('#absentia_aiaEnd_time_'+Edit_Absentia_id_hidden).text(format_time(end_time));
                                    $('#absentia_description_'+Edit_Absentia_id_hidden).text(description); 
                                    $('#absentia_modifiedOn_'+Edit_Absentia_id_hidden).text(getModifiedDate());                                        

                      
                                
                                $('#AddAIAE').modal('toggle');
                                $("#absentia_date_edit").val('');
                                $("#absentia_title_edit").val('');
                                $("#absentia_startTime_edit").val('');
                                $("#absentia_endTime_edit").val('');
                                $("#absentia_description_edit").val('');
                                reloadLogsTable();
                            }
                        });
                    }

                } // Call Back
            }, //end Confirm
            cancel: {
                label: "Cancel",
                callback: function() {}
            },

        }
    });
}
var getModifiedDate = function getModifiedDate(){
    var d = new Date();
    var weekday = new Array(7);
        weekday[0] =  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
    
    var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Aug";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";

    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    seconds = seconds < 10 ? '0'+seconds : seconds;
    var currentTime = hours + ':' + minutes + ":"+seconds+ ' ' + ampm;

    var dayName = weekday[d.getDay()];
    var daynth = nth( d.getDate() );
    var dayNumber =  d.getDate()
    var monthName = month[d.getMonth()];  
    var year = d.getFullYear(); 


    return (dayName + ', ' + dayNumber+daynth + ' '+ monthName+ ' '+year + ' at '+ currentTime);


}

var nth = function nth(n){
  return["st","nd","rd"][((n+90)%100-10)%10-1]||"th"
}


var deleteMistapRequest = function(Action_id, Missed_id, Table_name) {
//Remove mistap request
   if( Action_id > 0){
      $.ajax({
         type:"POST",
         cache:true,
         url:url+'/masterLayout/staff/deleteAddManual',
         data:{ 
            "Action_id":Action_id, 
            "Missed_id":Missed_id, 
            "Table_name":Table_name, 
            "_token": csrf 
            },
         success:function(result){
          
          var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
          var deleted_on = formatDate(new Date());  
          $('#deleted_manual_'+Missed_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
          $("#manual_table_row_"+Missed_id).addClass('deleted'); 
          reloadLogsTable();

         }
      });
   }
}






var deleteAddManual = function(Action_id, Missed_id, Table_name) {

   
    bootbox.dialog({
            message: "Are you sure you want to delete this Missed Tap?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Missed Tap",
                callback: function() { 
        
        
        
   if( Action_id > 0){
      $.ajax({
         type:"POST",
         cache:true,
         url:url+'/masterLayout/staff/deleteAddManual',
         data:{ 
            "Action_id":Action_id, 
            "Missed_id":Missed_id, 
            "Table_name":Table_name, 
            "_token": csrf 
            },
         success:function(result){
          
          var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
          var deleted_on = formatDate(new Date());  
          $('#deleted_manual_'+Missed_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
          $("#manual_table_row_"+Missed_id).addClass('deleted'); 
          reloadLogsTable();

         }
      });
   }
   
  }
                },
    cancel: {
                label: "Cancel",
                callback: function() { }
              },
              
            }
        });

    
}








var deleteAdjustment = function(Action_id) {

  if( Action_id > 0){
    $.ajax({
      type:"POST",
      cache:true,
      url:url+'/masterLayout/staff/deleteAdjustment',
      data:{ "Action_id":Action_id, "_token": csrf },
      success:function(result){
          var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
          var deleted_on = formatDate(new Date());  
          $('#deleted_adjustment_'+Action_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
          
          $("#exception_table_row_"+Action_id).addClass('deleted'); 
          reloadLogsTable();
       }
    });
  }
}  
var delete_Absentia = function(Absentia_id, Staff_id ){
   
   
      bootbox.dialog({
            message: "Are you sure you want to delete this Absentia?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Absentia",
                callback: function() { 
     
                 if( Absentia_id > 0){
                  $.ajax({
                    type:"POST",
                    cache:true,
                    url:url+'/masterLayout/staff/deleteAbsentia',
                    data:{ "Absentia_id":Absentia_id, "Staff_id":Staff_id, "_token": csrf },
                    success:function(result){ 
                      
                      var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
                      var deleted_on = formatDate(new Date());  
                      $('#deleted_absentia_'+Absentia_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
                      
                      $("#absentia_table_row_"+Absentia_id).addClass('deleted'); 
                      reloadLogsTable();
                    }
                  });
          }
        }
              },
        cancel: {
                label: "Cancel",
                callback: function() { }
              },
              
            }
        });
    
    
}  
var delectLeave = function(Action_id) {
     
      
    
     bootbox.dialog({
            message: "Are you sure you want to delete this Leave?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Leave",
                callback: function() { 
        
        
          if( Action_id > 0){
            
           $.ajax({
            type:"POST",
            cache:true,
            url:url+'/masterLayout/staff/deleteLeaveApp',
            data:{ "Action_id":Action_id, "_token": csrf },
            success:function(result){ 
            
            
             $('#adjustmentTableLeaves > tbody tr').each(function(index) {
              var $this = $(this);
              var filter = $this.attr('data-id');
              var id = Action_id;
              if(filter == id){ $this.addClass('deleted');
                var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
                var deleted_on = formatDate(new Date());  
                $('#deleted_'+id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')
                reloadLogsTable();
               }
            });
            
            }
           });
          }
         }
                },
    cancel: {
                label: "Cancel",
                callback: function() { }
              },
              
            }
        });
      
      
   }
var deleteLeavePenalties = function(Action_id){
  
$('#penaltyTable > tbody tr').each(function(index) {
  var $this = $(this);
  var filter = $this.attr('data-id');
  var id = Action_id;
  if(filter == id){ $this.remove(); }
});
if( Action_id > 0){
  $.ajax({
    type:"POST",
    cache:true,
    url:url+'/masterLayout/staff/deletePenalties',
    data:{ "Action_id":Action_id, "_token": csrf },
    success:function(result){


      var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
      var deleted_on = formatDate(new Date());  
      $('#deleted_penalty_'+Action_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
      
      $("#penalty_table_row_"+Action_id).addClass('deleted'); 
      reloadLogsTable();
     }
  });
}

}   
function formatDate(date) {
  var monthNames = [
    "Jan", "Feb", "Mar",
    "Apr", "May", "Jun", "Jul",
    "Aug", "Sep", "Oct",
    "Nov", "Dec"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}   

function showAll(tableId, rowName){

    var table = $('#'+tableId).DataTable();
    $.fn.dataTable.ext.search.pop();
    table.draw();    
    $('.hideHistory').hide()

    $('.showHistory').show()    
}
function showHistory(name, tableId, rowName){

 
    var table = $('#'+tableId).DataTable();
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
          return $(table.row(dataIndex).node()).attr('data-history') == name;
      });
     table.draw();

    $('.hideHistory').show()

    $('.showHistory').hide()
    
}


  
loadScript(url+"/metronic/global/scripts/datatable.js", function(){
    loadScript(url+"/metronic/global/plugins/datatables/datatables.min.js", function(){
        loadScript(url+"/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript(url+"/metronic/pages/scripts/profile.js", function(){
                loadScript(url+"/metronic/pages/scripts/table-datatables-managed.js", function(){ 
                  loadScript(url+"/metronic/global/plugins/bootbox/bootbox.min.js", function(){ 
                    loadScript(url+"/metronic/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript(url+"/metronic/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript(url+"/metronic/layouts/layout/scripts/demo.min.js", function(){
                                loadScript(url+"/metronic/global/plugins/select2/js/select2.full.min.js", function(){
                                    loadScript(url+"/metronic/pages/scripts/components-select2.min.js", function(){
                                        loadScript(url+"/metronic/js/jquery.filtertable.min.js", function(){
                                            loadScript(url+"/metronic/pages/scripts/datatable-expand.js", function(){
                                                loadScript(url+"/metronic/global/scripts/app.min.js", pagefunction);
                                            });
                                        });
                                    });

                                  });
                                });
                            });
                        });
                    });
                });
            });
        });
    });
});