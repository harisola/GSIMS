$(document).on('click','.btn-transparent',function(){
    $('.form_part_b').val("");
    $('#absentia_title').val("")
    $('#absentia_date').val("")
    $('#absentia_startTime').val("")
    $('#absentia_endTime').val("")
    $('#absentia_description').val("")
    $(".error").remove();
});




function createFormNumberMask(){
      $(".form_part_b").inputmask("mask", {
        "mask": "9999-999"
      });         
  }
  setTimeout(function(){ 
        createFormNumberMask();
}, 3000);

function checkHrFormNumberExistance(form_number,table){
    // var table='';
    var url=$('.main_url').val();

    var found=null;
    var data={
        'form_number':form_number,
        'table_name':table
    }
    var found=null;
    $.ajax({
       type:"GET",
       'async': false,
       url: url+'/check_hr_form_number_existance',
       data:data,
       success:function(res){
                found=res;
        }
   });

     if(parseInt(found)>0){
            alert('form number already exists')
            throw new Error("form number already exists");
            return false;
          }
}


function clearHrFormModalHTML(){
        $('#Absenia_Contents').html('');
        $('leave_staff_view').html('')
        $("#Penalties_Contents").html("");
        $("#Adjustment_Contents").html('');
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