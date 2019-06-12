var url=$('.main_url').val();
var csrf=$('.csrf').val();
var classPayRollFlexy = [];
var dailyReport = function(date,staffID){
    $.ajax({
       type:"POST",
       cache:true,
       data:{ 
        "date":date,
        "staff_id":staffID,
        "_token":csrf 
       },
       url:url+'/masterLayout/getDailyReport',
       success:function(e){
        var connectPayRoll=[false];
       $('.noShow').removeClass('noShow');
       var data = JSON.parse(e);

       if(data.length != 0){


      

           var expected_time = timeToMinute(data[0].day_time_in);
           localStorage.setItem('expected_time',expected_time);


           var ab_actual_tap_in="";
           var ab_actual_tap_out="";
           var expected_time_out = timeToMinute(data[0].day_time_out);
           var expected_time_out = timeToMinute(data[0].day_time_out);
           localStorage.setItem('expected_time_out',expected_time_out);
           
           var TapOutInMins = timeToMinute(data[0].day_time_out);


                    var expected_time_in = timeToMinute(data[0].day_time_in);
                    var first_tap = timeToMinute(data[0].tap_min);
                    var last_tap = timeToMinute(data[0].tap_max);
                    var payRollAttendance = data[0].payroll_time_slot;
                    payRollAttendance=payRollAttendance.replace(',,',',');
                    debugger;
                    if(data[0].ab_actual_tap!=""){
                        var ab_actual_tap_in=data[0].ab_actual_tap.split(',')[0];
                        var ab_actual_tap_out=data[0].ab_actual_tap.split(',')[1];
                        var ab_actual_tap_in_min=timeToMinute(data[0].ab_actual_tap.split(',')[0]);
                        var ab_actual_tap_out_min=timeToMinute(data[0].ab_actual_tap.split(',')[1]);
                    }
                   if(data[0].ab_actual_tap!=""){
                        var ab_set_tap_in_his_format=data[0].ab_rec_time.split(',')[0];
                        var ab_set_tap_out_his_format=data[0].ab_rec_time.split(',')[1];
                        var ab_set_tap_in=timeToMinute(data[0].ab_rec_time.split(',')[0]);
                        var ab_set_tap_out=timeToMinute(data[0].ab_rec_time.split(',')[1]);
                   }
                    
                    
           
                  if(data[0].ab_rec_time!="" && data[0].tap_min!=""){

                    
                      if(ab_actual_tap_in_min<ab_set_tap_in){
                          myString=payRollAttendance;
                          rangestart_timings=payRollAttendance.split(',')[0];
                          myString = myString.substring(myString.indexOf(',')+1)
                          myString =myString.replace(',','');
                          myNewPayroll=rangestart_timings+','+ab_actual_tap_in+','+ab_set_tap_in_his_format+','+data[0].day_time_out;
                          myNewPayroll = myNewPayroll.split(',')
                          var display_class_sequence=[false,true,true,true,false];
                          var css_class_name=['green-color','red-color','green-color','red-color'];
                      }else if(ab_set_tap_out==expected_time_out && ab_set_tap_in!=expected_time_in){
                          myString=payRollAttendance;
                          rangestart_timings=payRollAttendance.split(',')[0];
                          myString = myString.substring(myString.indexOf(',')+1);
                          myString =myString.replace(',','');

                          myNewPayroll=rangestart_timings+','+rangestart_timings+','+ab_actual_tap_in+','+data[0].day_time_out;
                          myNewPayroll = myNewPayroll.split(',');
                          var display_class_sequence=[false,true,true,true,false];
                          var css_class_name=['red-color','green-color','green-color','grey-color'];
                      }
                      if(ab_actual_tap_in_min<ab_set_tap_in && first_tap>expected_time_in){
                        var display_class_sequence=[false, true, true, true, true,false];
                        var css_class_name=["red-color", "green-color", "red-color","green-color", "red-color"];
                          myNewPayroll=rangestart_timings+','+data[0].tap_min+','+data[0].tap_max+','+ab_set_tap_in_his_format+','+data[0].day_time_out;
                                                    myNewPayroll = myNewPayroll.split(',');
                        // PayRollAttendanceSlider([420,440, 815, 840, 960],[false, true, true, true, true,false],["red-color", "green-color", "red-color","green-color", "red-color"],[360, 1020]);
                      }
                      // if(ab_actual_tap_in_min<ab_set_tap_in && last_tap<expected_time_out){
                      //   var display_class_sequence=[false, true, true, true, true,false];
                      //   var css_class_name=["red-color", "green-color", "red-color","green-color", "red-color"];
                      //     myNewPayroll=rangestart_timings+','+data[0].tap_min+','+data[0].tap_max+','+ab_set_tap_in_his_format+','+data[0].day_time_out;
                      //     myNewPayroll = myNewPayroll.split(',');
                      //   // PayRollAttendanceSlider([420,440, 815, 840, 960],[false, true, true, true, true,false],["red-color", "green-color", "red-color","green-color", "red-color"],[360, 1020]);
                      // }
                      // if(ab_actual_tap_in_min<ab_set_tap_in && last_tap>expected_time_out){
                      //   var display_class_sequence=[false, true, true, true, true,false];
                      //   var css_class_name=["red-color", "green-color", "red-color","green-color", "red-color"];
                      //     myNewPayroll=rangestart_timings+','+data[0].tap_min+','+data[0].tap_max+','+ab_set_tap_in_his_format+','+data[0].day_time_out;
                      //                               myNewPayroll = myNewPayroll.split(',');
                      //   // PayRollAttendanceSlider([420,440, 815, 840, 960],[false, true, true, true, true,false],["red-color", "green-color", "red-color","green-color", "red-color"],[360, 1020]);
                      // }






                  }
                  debugger;
                if(data[0].ab_rec_time!="" && data[0].tap_min==""){
                        
                             if(ab_set_tap_out==expected_time_out && ab_set_tap_in==expected_time_in){
                                  myString=payRollAttendance;
                                  rangestart_timings=payRollAttendance.split(',')[0];
                                  myString = myString.substring(myString.indexOf(',')+1)
                                  myString =myString.replace(',','');

                                  myNewPayroll=ab_set_tap_in_his_format+','+ab_set_tap_in_his_format+','+ab_set_tap_out_his_format+','+ab_set_tap_out_his_format;
                                  myNewPayroll = myNewPayroll.split(',');
                                  var display_class_sequence=[false,true,true,true,false];
                                  var css_class_name=['red-color','green-color','red-color','green-color'];
                              }
                              setTimeout(function(){
                                    var  payRollAttendanceArray = timeToMinuteForArray(myNewPayroll);
                                      PayRollAttendanceSlider(payRollAttendanceArray,display_class_sequence,css_class_name,[360,1020]);
                                      },2000);
                          }
                          if(data[0].ab_rec_time!="" && first_tap<=ab_set_tap_out && expected_time==ab_set_tap_in){
                              myString=payRollAttendance;
                              rangestart_timings=payRollAttendance.split(',')[0];
                              myString = myString.substring(myString.indexOf(',')+1)
                                                        myString =myString.replace(',','');

                              myNewPayroll=rangestart_timings+','+rangestart_timings+','+data[0].tap_min+','+data[0].day_time_out;
                              myNewPayroll = myNewPayroll.split(',')
                              var display_class_sequence=[false,true,true,true,false];
                              var css_class_name=['green-color','red-color','green-color','red-color'];
                              // if(TapOutInMins<expected_time_out){
                              //   myNewPayroll=rangestart_timings+','+rangestart_timings+','+ab_actual_tap_in+','+data[0].day_time_out;
                              //   myNewPayroll = myNewPayroll.split(',');
                              //   var display_class_sequence=[false,true,true,true,false];
                              //   var css_class_name=['red-color','green-color','green-color','grey-color'];
                              // }

                               setTimeout(function(){
                                    var  payRollAttendanceArray = timeToMinuteForArray(myNewPayroll);
                                    PayRollAttendanceSlider(payRollAttendanceArray,[false,true,true,true,true],['red-color','green-color','green-color','grey-color'],[360,1020]);
                              },2000);
                          }

                          if(data[0].ab_rec_time!="" && first_tap>ab_set_tap_out && expected_time==ab_set_tap_in){
                              myString=payRollAttendance;
                              rangestart_timings=payRollAttendance.split(',')[0];
                              myString = myString.substring(myString.indexOf(',')+1)
                              myString =myString.replace(',','');

                              myNewPayroll=rangestart_timings+','+ab_set_tap_out_his_format+','+data[0].tap_min+','+data[0].day_time_out;
                              myNewPayroll = myNewPayroll.split(',')
                              var display_class_sequence=[false, true, true, true, false];
                              var css_class_name=['green-color','red-color','green-color','red-color'];
                            
                               setTimeout(function(){
                                    var  payRollAttendanceArray = timeToMinuteForArray(myNewPayroll);
                                    PayRollAttendanceSlider(payRollAttendanceArray,[false, true, true, true, false],['green-color','red-color','green-color','red-color'],[360,1020]);
                              },2000);
                          }
                          if(data[0].ab_rec_time!="" && first_tap>ab_set_tap_out && expected_time==ab_set_tap_in && last_tap<expected_time_out){
                              
                              
                              

                              
                               setTimeout(function(){
                                  myString=data[0].payroll_time_slot;
                                  rangestart_timings=data[0].payroll_time_slot.split(',')[0];
                                  myString = myString.substring(myString.indexOf(',')+1);
                                  myString =myString.replace(',','');

                                  myNewPayroll=rangestart_timings+','+data[0].ab_rec_time.split(',')[1]+','+data[0].tap_min+','+data[0].tap_max+','+ab_set_tap_in_his_format+','+data[0].day_time_out;
                                  myNewPayroll = myNewPayroll.split(',')
                                  var display_class_sequence=[false, true, true, true, true,true,false];
                                  var css_class_name=["green-color","red-color", "green-color", "red-color","red-color", "red-color"];
                                    var  payRollAttendanceArray = timeToMinuteForArray(myNewPayroll);
                                    PayRollAttendanceSlider(payRollAttendanceArray,display_class_sequence,css_class_name,[360,1020]);
                              },2000);
                          }






          getLeaveDailyReport(staffID,date,data);

           // Weekly Time Sheet
                var weekly_time_sheet_in = timeToMinute(data[0].day_time_in);
                var weekly_time_sheet_out = timeToMinute(data[0].day_time_out);
                setTimeout(function(){
                  if(data[0].ab_rec_time!="" && data[0].tap_min!=""){
                    var  payRollAttendanceArray = timeToMinuteForArray(myNewPayroll);
                      PayRollAttendanceSlider(payRollAttendanceArray,display_class_sequence,css_class_name,[360,1020]);
                  }


                    // PayRollAttendanceSlider(payRollAttendanceArray,[false,true,true,true,false],['green-color','red-color','green-color','red-color'],[360,1020]);

                      },1000);


                      
                      
                      

                console.log('expected time in'+weekly_time_sheet_in);
                console.log('expected time out'+weekly_time_sheet_out);
                                  window.FinalTimeOut=data[0].tap_max;
                var range = [];
                if(weekly_time_sheet_in && weekly_time_sheet_out){
                  range.push(parseInt(parseInt(weekly_time_sheet_in)-parseInt(60)));
                  range.push(parseInt(parseInt(weekly_time_sheet_out)+parseInt(60)));
                  window.range_start=parseInt(parseInt(weekly_time_sheet_in)-parseInt(60));
                  window.range_end=parseInt(parseInt(weekly_time_sheet_out)+parseInt(60));

                }else{
                  $('#weeklySlider').addClass('noShow');
                  range.push(360);
                  range.push(1000);
                  window.range_start=360;
                  window.range_end=1000;
                }

                var compliance_in = data[0].compliance_in;
                var compliance_out = data[0].compliance_out;
                var compliance_duration = data[0].compliance_duration;
                var is_on_flexy = data[0].is_on_flexy;

                

                var buffer_used = data[0].buffer_minutes_in;
                var buffer_used_out = data[0].buffer_minutes_out;

                if(buffer_used_out == ''){
                  buffer_used_out = 0
                }

                if(buffer_used == ''){
                  buffer_used = 0;
                }

                var factor = data[0].fuctor;
                //  Calculating minute for working
                var minutes_wh = parseInt(data[0].minutes_wh);
                var minutes_w = data[0].minutes_w;
                var factor_calculation = 0;
                  
                if(minutes_wh != null && minutes_wh >= 1){
                  factor_calculation  = minutes_wh/minutes_w;
                }else{
                    factor_calculation = 0;
                }

                factor_calculation = factor_calculation.toFixed(2);

                if(factor_calculation >= 1){
                  factor_calculation = 1;
                }

                // Mapping variable for Factor , Previous Leave and Remaining Leave
                var factor_deduction = data[0].fuctor_nod;
                var previous_leave = data[0].prv_rem_leaves;
                var current_leave = data[0].rem_leaves;
                var currentDateFlag = 0;




                // Actual Tap In And Tapout
                var time = data[0].tap_time;
                var time_flag = data[0].tap_io;
                if(time){
                   time = time.split(',');
                   window.myTime=time;
                   var timeMinute = timeToMinuteForArray(time);
                }
                if(time_flag){
                   time_flag = time_flag.split(',');
                }

                




                 // Absentia Allocated

                var absentia_allocated_time = data[0].ab_rec_time;
                var absentia_flag = data[0].ab_rec_io;

                if(absentia_allocated_time){
                     absentia_allocated_time = absentia_allocated_time.split(',');
                     var absentia_allocated = timeToMinuteForArray(absentia_allocated_time);
                }else{
                   absentia_allocated_time = '';
                }

                if(absentia_flag){
                   absentia_flag = absentia_flag.split(',');
                }


                // Buffer Utilization
                
                if(buffer_used != 0 || buffer_used_out != 0 && data[0].holiday == null){
                   var buffer_array = [];
                   var buffer_connect = [false];
                   var buffer_tooltip = [];
                   var buffer_in = parseInt(buffer_used);
                   var buffer_out = parseInt(buffer_used_out);
                   var buffer_tooltip_diplay = [];
                   if(buffer_in != 0){
                                            
                      buffer_tooltip_diplay.push(buffer_used);
                      buffer_array.push(weekly_time_sheet_in);
                      buffer_in = parseInt(weekly_time_sheet_in)+parseInt(buffer_used);
                      buffer_array.push(buffer_in);
                      buffer_connect.push(true,false);
                      buffer_tooltip.push(false,true);
                      
                   }

                   if(buffer_out != 0){
                      
                      buffer_tooltip_diplay.push(buffer_used_out);
                      buffer_array.push(weekly_time_sheet_out);
                      buffer_out = parseInt(weekly_time_sheet_out)+parseInt(buffer_out);
                      buffer_array.push(buffer_out);
                      buffer_connect.push(true,false);
                      buffer_tooltip.push(false,true);
                      
                   }
                   
                   
                   bufferInOut(buffer_array,buffer_connect,buffer_tooltip,buffer_tooltip_diplay);
                   
                }else if(buffer_used != 0 || buffer_used_out != 0 && data[0].holiday != null && data[0].holidayflag == 0){
                  
                  //Case # 1 Holiday and is off for Particular Staff
                   buffer_used = 0;
                   buffer_used_out = 0;
                   bufferInOut([0,0],false,false,false);
                }else if(buffer_used != 0 || buffer_used_out != 0 && data[0].holiday != null && data[0].holidayflag == 1){
                   
                   var buffer_array = [];
                   var buffer_connect = [false];
                   var buffer_tooltip = [];
                   var buffer_in = parseInt(buffer_used);
                   var buffer_out = parseInt(buffer_used_out);
                   var buffer_tooltip_diplay = [];
                   if(buffer_in != 0){
                      
                      buffer_tooltip_diplay.push(buffer_used);
                      buffer_array.push(weekly_time_sheet_in);
                      buffer_in = parseInt(weekly_time_sheet_in)+parseInt(buffer_used);
                      buffer_array.push(buffer_in);
                      buffer_connect.push(true,false);
                      buffer_tooltip.push(false,true);
                      
                   }

                   if(buffer_out != 0){
                      
                      buffer_tooltip_diplay.push(buffer_used_out);
                      buffer_array.push(weekly_time_sheet_out);
                      buffer_out = parseInt(weekly_time_sheet_out)+parseInt(buffer_out);
                      buffer_array.push(buffer_out);
                      buffer_connect.push(true,false);
                      buffer_tooltip.push(false,true);
                      
                   }
                   
                   
                   bufferInOut(buffer_array,buffer_connect,buffer_tooltip,buffer_tooltip_diplay);

                }else{

                   buffer_used = 0;
                   buffer_used_out = 0;
                   bufferInOut([0,0],false,false,false);
                }


                 // PayRoll Attendace Without Flexy

                if(is_on_flexy == 0){


                    if(time.length > 0 && data[0].holiday == null){




                      // var connectPayRoll = [false];
                      var classPayRoll = [];
                      var payRollAttendance = data[0].payroll_time_slot;
                      myString=payRollAttendance;
                      rangestart_timings=payRollAttendance.split(',')[0];
                      myString = myString.substring(myString.indexOf(',')+1);
                      myString =myString.replace(',','');

                      console.log(rangestart_timings+','+rangestart_timings+','+myString);

                      payRollAttendance = payRollAttendance.split(',')
                      var  payRollAttendanceArray = timeToMinuteForArray(payRollAttendance);

                      console.log("payRollAttendanceArrayBefore"+payRollAttendanceArray);
                      var TapCount = data[0].tap_io_num;

                      var payRollFlag = data[0].payroll_time_code;
                      var payRollFlag = payRollFlag.split(',');
                      absentia_start_time=0;

                      if(data[0].ab_rec_time!=""){
                               var absentia_start_time = timeToMinute(data[0].ab_rec_time.split(",")[0]);
                               var absentia_end_time = timeToMinute(data[0].ab_rec_time.split(",")[1]);
                               var absentia_end_time_simple = data[0].ab_rec_time.split(",")[1];

                               var taps=  data[0].ab_rec_time.split(",");
                               var total_taps=taps.length;
                                if(absentia_start_time>expected_time){
                                    //absentia in middle day
                                     // absentia_time='after morrning';
                                        var absentia_in_afternoon=true;

                                        

                                        var total_tap_1=data[0].payroll_time_slot.split(absentia_end_time_simple)[0];
                                        var total_tap_2=data[0].payroll_time_slot.split(absentia_end_time_simple)[1];
                                        var new_time_slot=total_tap_1+data[0].ab_rec_time+total_tap_2;
                                        // data[0].payroll_time_slot=new_time_slot;

                                        // payRollAttendance = new_time_slot;
                                        // payRollAttendance = payRollAttendance.split(',')
                                        // payRollAttendanceArray = timeToMinuteForArray(payRollAttendance);
                                        // console.log("Apply Absentia"+payRollAttendanceArray)
                                        // if(total_taps>2){
                                        //   //if tap and absentia and user avail absentia
                                        // }else{
                                        //     //if tap and absentia and user not avail absentia


                                        // }
                                        // if(absentia_end_time)




                                 }else{
                                    //absentia in morrning 
                                    //and tap found in morning

                                    if(first_tap<absentia_start_time){
                                        console.log('absentia will apply in morning')
                                        var morning_tap_and_absentia=true;
                                    }
                                 }

                           }
                      // Arranging PayRoll Flag if Actual Time is Greater Then Expected Time

                      for(var i = 0 ; i< payRollFlag.length ; i++){
                         if(payRollFlag[i] == 'Ei' &&  payRollAttendanceArray[i+1] < payRollAttendanceArray[i]){
                            payRollAttendanceArray[i+1] = payRollAttendanceArray[i];
                           }

                         if(payRollFlag[i] == 'Eo' && payRollAttendanceArray[i-1] > payRollAttendanceArray[i]){

                            for(j = payRollFlag.length ; j > 0 ; j--){
                               if(payRollAttendanceArray[j-1] > payRollAttendanceArray[j])
                               payRollAttendanceArray[j-1] = payRollAttendanceArray[j];
                            }


                            
                         }

                         if(payRollFlag[i] == 'Ei' && buffer_used != 0){
                            payRollAttendanceArray[i+1] = parseInt(payRollAttendanceArray[i+1])-parseInt(buffer_used);
                         }


                         if(payRollFlag[i] == 'Eo' && buffer_used_out != 0){
                            payRollAttendanceArray[i-1] = parseInt(payRollAttendanceArray[i-1])+parseInt(buffer_used_out);
                         }

                         if(payRollFlag[i] && payRollFlag[i] == 'Eo' ){
                            var addMinute = parseInt(payRollAttendanceArray[i]) + parseInt(1);
                            if(addMinute == payRollAttendanceArray[i+1]){
                               payRollFlag.splice(i,2);
                               payRollAttendanceArray.splice(i,2);
                            }
                         }


                         

                      }

                      if((Date.parse(date) == Date.parse(data[0].today_date)) && payRollFlag.indexOf('0') == -1 ){
                         console.log('at today date');
                         var index =   payRollFlag.indexOf('Eo');
                         var EoValue = payRollAttendanceArray[index];
                         payRollFlag.splice(index, 1);
                         payRollAttendanceArray.splice(index, 1);

                         var OutIndex = payRollFlag.indexOf('0');
                         var OutIndexManual = payRollFlag.indexOf('9');
                         if(OutIndex == -1 && OutIndexManual){
                            var InIndex =  payRollFlag.indexOf('1');
                            var InValue = payRollAttendanceArray[InIndex];
                            currentDateFlag = 1;
                            payRollFlag.push('0');
                            payRollAttendanceArray.push(InValue);

                          }

                      }

                      
                      console.log("payRollAttendanceArrayAfter2--------"+payRollAttendanceArray);
                      console.log("payRollAttendanceArrayAfter2--------"+payRollFlag);
 

                      if(payRollFlag.length > 0 && data[0].holiday == null){

                          
                         for(var i = 0 ; i < payRollFlag.length ; i++){



                            if(payRollFlag[i] == 'Ei'){
                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');

                            }

                            if(payRollFlag[i] == '1' || payRollFlag[i] == '8'){
                               connectPayRoll.push(true);
                               // If Staff Only Tap IN OR NOT TAP OUT TapCount == 1 

                                // if(first_tap<absentia_start_time){
                                //         console.log('absentia will apply in morning')
                                //         connectPayRoll.push(true);
                                //         classPayRoll.push('orange-color');

                                // }
                                if(morning_tap_and_absentia==true){
                                  classPayRoll.push('orange-color');

                                }
                               if(TapCount == 1){
                                classPayRoll.push('red-color');
                               }else{
                                classPayRoll.push('green-color');
                               }
                              


                            }

                            if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '0' ){
                                console.log('At Current Date Flag = 0');
                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');
                            }

                            if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '1' ){
                               connectPayRoll.push(false);
                               classPayRoll.push('red-color');
                               console.log('At Current Date Flag = 1');

                            }

                            if(payRollFlag[i] == 'Eo'){
                               connectPayRoll.push(false);
                               classPayRoll.push('grey-color');

                            }

                            if(payRollFlag[i] == 'Ao'){

                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');

                            }

                            if(payRollFlag[i] == 'ARo'){

                               connectPayRoll.push(true);
                               classPayRoll.push('green-color');


                            }

                            if(payRollFlag[i] == 'ARi'){

                               if(payRollFlag[i+1] == 'Ai'){
                                //here i have to place condition for absentia and not check
                                  classPayRoll.push('orange-color');
                               }else{
                                  classPayRoll.push('green-color');
                               }
                               connectPayRoll.push(true);
                            }

                            if(payRollFlag[i] == 'Ai'){


                               connectPayRoll.push(true);
                               classPayRoll.push('green-color');

                            }

                            // Leave Seting For 100 %

                            if(payRollFlag[i] == '10o'){
                               connectPayRoll.push(true);
                               classPayRoll.push('black-color');
                            }

                            if(payRollFlag[i] == '5o'){
                               connectPayRoll.push(true);
                               classPayRoll.push('yellow-color');
                            }

                            if(payRollFlag[i] == '0o'){
                               connectPayRoll.push(true);
                               classPayRoll.push('white-color');
                            }

                            if(payRollFlag[i] == '10i' || payRollFlag[i] == '5i' || payRollFlag[i] == '0i'){
                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');
                            }
                         }
                         console.log(payRollAttendanceArray)
                        PayRollAttendanceSlider(payRollAttendanceArray,connectPayRoll,classPayRoll,range);
                      }else if(data[0].holiday != null && data[0].holidayflag == 0){
                        //Case # 1 Holiday and is off for Particular Staff
                        PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                      }else if(data[0].holiday != null && data[0].holidayflag == 1){
                        //Case # 2 Holiday and is on for Particular Staff
                          console.log('at case 2');
                          for(var i = 0 ; i < payRollFlag.length ; i++){

                            if(payRollFlag[i] == 'Ei'){
                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');

                            }

                            if(payRollFlag[i] == '1' || payRollFlag[i] == '8'){
                               connectPayRoll.push(true);
                               classPayRoll.push('green-color');

                            }

                            if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '0' ){
                                console.log('At Current Date Flag = 0');
                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');
                            }

                            if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '1' ){
                               connectPayRoll.push(false);
                               classPayRoll.push('red-color');
                               console.log('At Current Date Flag = 1');

                            }

                            if(payRollFlag[i] == 'Eo'){
                               connectPayRoll.push(false);
                               classPayRoll.push('grey-color');

                            }

                            // Staff Leave the Office for Absentia
                            if(payRollFlag[i] == 'Ao'){

                               connectPayRoll.push(true);
                               classPayRoll.push('red-color');

                            }

                            // Staff Allocated leave the office for Abesntia
                            if(payRollFlag[i] == 'ARo'){

                               connectPayRoll.push(true);
                               classPayRoll.push('green-color');


                            }

                            if(payRollFlag[i] == 'ARi'){

                               if(payRollFlag[i+1] == 'Ai'){
                                  classPayRoll.push('red-color');
                               }else{
                                  classPayRoll.push('green-color');
                               }
                               connectPayRoll.push(true);
                            }

                            if(payRollFlag[i] == 'Ai'){


                               connectPayRoll.push(true);
                               classPayRoll.push('green-color');


                            }
                         }

                        PayRollAttendanceSlider(payRollAttendanceArray,connectPayRoll,classPayRoll,range);
                      }

                   }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in)){
                        $('#PayrollAttendance').addClass('noShow');
                        PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                   }else{

                      if(Date.parse(date) > Date.parse(data[0].today_date)){
                        $('#PayrollAttendance').addClass('noShow');
                        PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                      }else{
                        PayRollAttendanceSlider([weekly_time_sheet_in,weekly_time_sheet_out],[false,true,false],['red-color'],range);
                      }
                   }
                }else{

                   // Status for Flexy
                   // Same For In Flexy
                   // Out Ef For Flexy
                   if(time.length > 0){
                      var flexyForOut = data[0].payroll_time_out;
                      flexyForOut = timeToMinute(flexyForOut);
                      var tap_max = data[0].tap_max;
                      tap_max = timeToMinute(tap_max);
                      var connectPayRollFlexy = [false];
                      var payRollAttendanceFlexy = data[0].payroll_time_slot;
                      payRollAttendanceFlexy = payRollAttendanceFlexy.split(',')
                      var  payRollAttendanceArrayFlexy = timeToMinuteForArray(payRollAttendanceFlexy);
                      console.log("payRollAttendanceArrayBefore"+payRollAttendanceArrayFlexy);
                      var payRollFlagFlexy = data[0].payroll_time_code;
                      payRollFlagFlexy = payRollFlagFlexy.split(',');
                      var TapCount = data[0].tap_io_num;
                      // Arranging PayRoll Flag if Actual Time is Greater Then Expected Time
                         for(var i = 0 ; i< payRollFlagFlexy.length ; i++){
                            if(payRollFlagFlexy[i] == 'Ei' &&  payRollAttendanceArrayFlexy[i+1] < payRollAttendanceArrayFlexy[i]){
                               payRollAttendanceArrayFlexy[i+1] = payRollAttendanceArrayFlexy[i];
                            }

                            if(payRollFlagFlexy[i] == 'Eo' && payRollAttendanceArrayFlexy[i-1] > payRollAttendanceArrayFlexy[i]){

                               for(j = payRollFlagFlexy.length ; j > 0 ; j--){
                                  if(payRollAttendanceArrayFlexy[j-1] > payRollAttendanceArrayFlexy[j])
                                  payRollAttendanceArrayFlexy[j-1] = payRollAttendanceArrayFlexy[j];
                               }
                               
                            }


                            if(payRollFlagFlexy[i] == 'Ei' && buffer_used != 0){
                               payRollAttendanceArrayFlexy[i+1] = parseInt(payRollAttendanceArrayFlexy[i+1])-parseInt(buffer_used);
                            }


                            if(payRollFlagFlexy[i] == 'Eo' && buffer_used_out != 0){
                               payRollAttendanceArrayFlexy[i-1] = parseInt(payRollAttendanceArrayFlexy[i-1])+parseInt(buffer_used_out);
                            }

                            if(payRollFlagFlexy[i]){
                               var addMinute = parseInt(payRollAttendanceArrayFlexy[i]) + parseInt(1);
                               if(addMinute == payRollAttendanceArrayFlexy[i+1]){
                                  payRollFlagFlexy.splice(i,2);
                                  payRollAttendanceArrayFlexy.splice(i,2);
                               }
                            }

                            if(payRollFlagFlexy[i] == 'Eo' && tap_max > payRollAttendanceArrayFlexy[i]){
                                payRollFlagFlexy.push('Tm');
                                
                                if(tap_max >= flexyForOut){
                                  payRollAttendanceArrayFlexy.push(flexyForOut);
                                }else{
                                  payRollAttendanceArrayFlexy.push(tap_max);
                                }
                                
                            }

                         }

                         // ADD OUT TIME AND STATUS FOR FLEXY
                         payRollAttendanceArrayFlexy.push(flexyForOut);
                         payRollFlagFlexy.push("Ef");

                         console.log("payRollAttendanceArrayFlexy"+payRollAttendanceArrayFlexy)
                         console.log("payRollFlagFlexy"+payRollFlagFlexy)

                         if(payRollFlagFlexy.length > 0 && data[0].holiday == null){

                            for(var i = 0 ; i < payRollFlagFlexy.length ; i++){

                               if(payRollFlagFlexy[i] == 'Ei'){
                                  
                                  if(flexyForOut == weekly_time_sheet_out){
                                     classPayRollFlexy.push('red-color');
                                  }else{
                                      classPayRollFlexy.push('yelow-color');
                                  }
                                  connectPayRollFlexy.push(true);
                               }

                               if(payRollFlagFlexy[i] == '1' || payRollFlagFlexy[i] == '8'){
                                  connectPayRollFlexy.push(true);
                                  // If Staff Only Tap IN OR NOT TAP OUT TapCount == 1 
                                  if(TapCount == 1){
                                    classPayRollFlexy.push('red-color');
                                  }else{
                                    classPayRollFlexy.push('green-color');
                                  }
                                  
                               }

                               if(payRollFlagFlexy[i] == '0' ||  payRollFlagFlexy[i] == '9'){
                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('red-color');
                               }

                               if(payRollFlagFlexy[i] == 'Eo'){

                                  connectPayRollFlexy.push(true);
                                  if(payRollAttendanceArrayFlexy[i] >= tap_max){
                                    console.log('tap Max less Than '+tap_max);
                                    classPayRollFlexy.push('red-color');
                                  }else{
                                    classPayRollFlexy.push('yelow-color');
                                  }
                               }

                               if(payRollFlagFlexy[i] == 'Tm'){
                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('red-color');
                               }

                               if(payRollFlagFlexy[i] == 'Ao'){

                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('red-color');
                               }

                               if(payRollFlagFlexy[i] == 'ARo'){

                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('green-color');


                               }

                               if(payRollFlagFlexy[i] == 'ARi'){

                                  if(payRollFlagFlexy[i+1] == 'Ai'){
                                     classPayRollFlexy.push('red-color');
                                  }else{
                                     classPayRollFlexy.push('green-color');
                                  }
                                  connectPayRollFlexy.push(true);
                               }

                               if(payRollFlagFlexy[i] == 'Ai'){

                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('green-color');

                               }

                               if(payRollFlagFlexy[i] == 'Ef'){
                                  connectPayRollFlexy.push(false);
                                  classPayRollFlexy.push('green-color');

                               }


                            }
                            PayRollAttendanceSlider(payRollAttendanceArrayFlexy,connectPayRollFlexy,classPayRollFlexy,range);
                         }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNan(weekly_time_sheet_in) ){
                        //Case # 1 Holiday and is off for Particular Staff
                         $('#PayrollAttendance').addClass('noShow');
                        PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                      }else if(data[0].holiday != null && data[0].holidayflag == 1){
                        for(var i = 0 ; i < payRollFlagFlexy.length ; i++){

                           if(payRollFlagFlexy[i] == 'Ei'){
                              
                              if(flexyForOut == weekly_time_sheet_out){
                                 classPayRollFlexy.push('red-color');
                              }else{
                                  classPayRollFlexy.push('yelow-color');
                              }
                              connectPayRollFlexy.push(true);
                           }

                           if(payRollFlagFlexy[i] == '1' || payRollFlagFlexy[i] == '8'){
                              connectPayRollFlexy.push(true);
                              classPayRollFlexy.push('green-color');
                           }

                           if(payRollFlagFlexy[i] == '0' ||  payRollFlagFlexy[i] == '9'){
                              connectPayRollFlexy.push(true);
                              classPayRollFlexy.push('red-color');
                           }

                           if(payRollFlagFlexy[i] == 'Eo'){

                              connectPayRollFlexy.push(true);
                              if(payRollAttendanceArrayFlexy[i] >= tap_max){
                                console.log('tap Max less Than '+tap_max);
                                classPayRollFlexy.push('red-color');
                              }else{
                                classPayRollFlexy.push('yelow-color');
                              }
                           }

                           if(payRollFlagFlexy[i] == 'Tm'){
                              connectPayRollFlexy.push(true);
                              classPayRollFlexy.push('red-color');
                           }

                           if(payRollFlagFlexy[i] == 'Ao'){

                              connectPayRollFlexy.push(true);
                              classPayRollFlexy.push('red-color');
                           }

                           if(payRollFlagFlexy[i] == 'ARo'){

                              connectPayRollFlexy.push(true);
                              classPayRollFlexy.push('green-color');
                           }

                           if(payRollFlagFlexy[i] == 'ARi'){

                              if(payRollFlagFlexy[i+1] == 'Ai'){
                                 classPayRollFlexy.push('red-color');
                              }else{
                                 classPayRollFlexy.push('green-color');
                              }
                              connectPayRollFlexy.push(true);
                           }

                           if(payRollFlagFlexy[i] == 'Ai'){

                              connectPayRollFlexy.push(true);
                              classPayRollFlexy.push('green-color');
                           }

                           if(payRollFlagFlexy[i] == 'Ef'){
                              connectPayRollFlexy.push(false);
                              classPayRollFlexy.push('green-color');
                           }


                        }
                        PayRollAttendanceSlider(payRollAttendanceArrayFlexy,connectPayRollFlexy,classPayRollFlexy,range);
                      }

                   }else{

                    if(Date.parse(date) > Date.parse(data[0].today_date)){
                        $('#PayrollAttendance').addClass('noShow');
                        PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                      }else{
                        PayRollAttendanceSlider([weekly_time_sheet_in,weekly_time_sheet_out],[false,true,false],['red-color'],range);
                      }
                   }




                }
                



                
             //// ================ Weekly Tap in ==============//
             ////================================================//


                if(weekly_time_sheet_in && weekly_time_sheet_out && data[0].holiday == null ){

                   var tap = [weekly_time_sheet_in,weekly_time_sheet_out];
                   var connect = [false,true,false];
                   weeklyTapInTapOut(tap,connect,range);

                }else if(data[0].holiday != null && data[0].holidayflag == 0 && weekly_time_sheet_in && weekly_time_sheet_out){

                   //Case # 1 Holiday and is off for Particular Staff
                   weeklyTapInTapOut([0,0],false,range);
                   $('#weeklySlider').addClass('noShow');

                }else if(data[0].holiday != null && data[0].holidayflag == 1 && weekly_time_sheet_in && weekly_time_sheet_out){

                  //Case # 2 Holiday and is on for Particular Staff
                   var tap = [weekly_time_sheet_in,weekly_time_sheet_out];
                   var connect = [false,true,false];
                   weeklyTapInTapOut(tap,connect,range);
                }else{
                  weeklyTapInTapOut([0,0],false,range);
                }




             //// ================ Actual Tap In And Tapout ==============//
             ////==============================================================//

               // Remove The IN or OUT for Leave
                if(time_flag){
                  for(var j = 0 ; j < time_flag.length ; j++){
                    if(time_flag[j] == '10o' || time_flag[j] == '5o' || time_flag[j] == '0o'){
                      time_flag.splice(j,1);
                      timeMinute.splice(j,1);
                    }

                    if(time_flag[j] == '10i' || time_flag[j] == '5i' || time_flag[j] == '0i'){
                      time_flag.splice(j,1);
                      timeMinute.splice(j,1);
                    }
                  }
                }


                if(time_flag){
                  var miss_tap_index = time_flag.indexOf('9');
                  var connect1 = [false];
                  var classes = [];
                  var uihandle = [];
                  var noUitooltip =[];
                  for(var i = 0 ; i < time_flag.length;i++){
                     if(time_flag[i] == '8'){
                           connect1.push(true);
                           classes.push('green-color');
                           uihandle.push('red-bar');
                           noUitooltip.push('In');
                     }

                     if(time_flag[i] == '1'){
                           connect1.push(true);
                           classes.push('green-color');
                           uihandle.push('normal-bar');
                           noUitooltip.push('In');
                     }



                  if(time_flag[i] == '0'){         
                        connect1.push(true);
                        classes.push('grey-color');
                        uihandle.push('normal-bar');
                        noUitooltip.push('Out');              
                     }




                  if(time_flag[i] == '9'){
                           connect1.push(true);

                           var class_push_flag = 0;
                            
                           for(var j = i+1 ; j < time_flag.length;j++){
                              if(time_flag[j] == '1' || time_flag[j] == '8'){
                                 class_push_flag =1;
                              }
                           }
                           if(class_push_flag == 1){
                               classes.push('grey-color');
                           }else{
                               classes.push('green-color');
                           }

                          
                           uihandle.push('red-bar');
                           noUitooltip.push('Out');  
                     }


                  }

                  console.log('connnect1'+connect1);
                  connect1.splice(connect1.length-1);
                  connect1.push(false)

                  if(miss_tap_index !== -1){
                     console.log(miss_tap_index);
                     classes[miss_tap_index-1] = 'green-color';
                     console.log(classes);
                  }

                  console.log('noUitooltip'+noUitooltip);
                  actualTapInTapOut(timeMinute,connect1,classes,uihandle,noUitooltip,range)  

             }else{
                actualTapInTapOut([0,0,0,0],false,'','','',range);
                $('#tapSlider').addClass('noShow');
             }

             // ================= ABSENTIA ALLOCATED TIME =====================//
             //===============================================================//




              if(absentia_flag && data[0].holiday == null){

                 var connect_abasentia = [false];
                 //var classes_absentia = [];

                 for(var i = 0 ; i < absentia_flag.length ; i++){
                    if(absentia_flag[i] == '7'){
                         connect_abasentia.push(true);
                    }

                    if(absentia_flag[i] == '6'){
                       connect_abasentia.push(false);
                       
                    }
                 }

                 absentiaAllocatedTap(absentia_allocated,connect_abasentia,range);
              }else if(data[0].holiday != null && data[0].holidayflag == 0 && absentia_flag){
                //Case # 1 Holiday and is off for Particular Staff
                absentiaAllocatedTap([0,0,0,0],false,range);
                $('#AiAabsentia').addClass('noShow');
              }else if (data[0].holiday != null && data[0].holidayflag == 1 && absentia_flag){
                //Case # 2 Holiday and is on for Particular Staff
                var connect_abasentia = [false];
                 for(var i = 0 ; i < absentia_flag.length ; i++){
                    if(absentia_flag[i] == '7'){
                         connect_abasentia.push(true);
                    }

                    if(absentia_flag[i] == '6'){
                       connect_abasentia.push(false);
                       
                    }
                 }

                absentiaAllocatedTap(absentia_allocated,connect_abasentia,range);
              }else{
                absentiaAllocatedTap([0,0,0,0],false,range);
                $('#AiAabsentia').addClass('noShow');
              }


              // Daily Buffer And Monthly Buffer

             var daily_relax_in = data[0].daily_relax_in;
             var monthly_relax_in = data[0].monthly_relax_in;
             var buffer_minutes_in = data[0].buffer_minutes_in;
             var rem_buffer_in = data[0].rem_buffer_in;

             if(buffer_minutes_in == ''){
                buffer_minutes_in = 0
             }

             $('.daily_buffer_used').text(buffer_minutes_in+"min / "+daily_relax_in+"min");
             $('.monthly_buffer_used').text(rem_buffer_in+"min / "+monthly_relax_in+"min");
             $('.daily_buffer_assign').text(daily_relax_in+"min");
             $('.monthly_buffer_assign').text(rem_buffer_in+"min");

              

             // Compilance_in
             if( (data[0].holiday == null || data[0].holidayflag == 1) && isNaN(weekly_time_sheet_in) == false ){
                
                if(data[0].tap_io == '' && Date.parse(date) > Date.parse(data[0].today_date)){
                   $('.compliance_one_img').attr("src", url+'/img/complaint_gray.png');
                }else{

                 if(compliance_in == 1){
                    $('.compliance_one_img').attr("src", url+"/img/complaint.png");
                 }else if(compliance_in == 0){
                    $('.compliance_one_img').attr("src", url+'/img/noncomplaint.png');
                 }
                }
             }else if ((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in) == true  ){
              $('.compliance_one_img').attr("src", url+'/img/complaint_gray.png');
             }

             
             // Compilance_out
            if((data[0].holiday == null || data[0].holidayflag == 1) && isNaN(weekly_time_sheet_in) == false){ 
              if(data[0].tap_io == '' && Date.parse(date) > Date.parse(data[0].today_date)){
                   $('.compliance_two_img').attr("src", url+'/img/complaint_gray.png');
                }else{
                 if(compliance_out == 1){
                    $('.compliance_two_img').attr("src", url+'/img/complaint.png');
                 }else if(compliance_out == 0){
                    $('.compliance_two_img').attr("src", url+'/img/noncomplaint.png');
                 }
               }
            }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in) == true){
              $('.compliance_two_img').attr("src", url+'/img/complaint_gray.png');
            }

            // Compilance_duration 
            if((data[0].holiday == null || data[0].holidayflag == 1) && isNaN(weekly_time_sheet_in) == false){
              if(data[0].tap_io == '' && Date.parse(date) > Date.parse(data[0].today_date)){
                    $('.compliance_duration_img').attr("src", url+'/img/complaint_gray.png');
                }else{
              if(compliance_duration == 1){
                  $('.compliance_duration_img').attr("src", url+'/img/complaint.png');
              }else if(compliance_duration == 0){
                  $('.compliance_duration_img').attr("src", url+'/img/noncomplaint.png');
              }
            }
            }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in) == true){
              $('.compliance_duration_img').attr("src", url+'/img/complaint_gray.png');
            }

                          // Factor Mapping

            if(factor_calculation){
              $('.factor_remaining_deduction').text(factor_calculation);
            }else{
               $('.factor_remaining_deduction').text('0');
            }

            if(new Date(date) < new Date(data[0].today_date)){
              if(factor_deduction){
               $('.factor_deduction_from').text(factor_deduction);
              }else{
               $('.factor_deduction_from').text('0');
              }
            }else{
              $('.factor_deduction_from').text('0');
            }


            // Leave Mapping                           
            if(new Date(date) < new Date(data[0].today_date)){

               if(current_leave==null){
                  current_leave=0;
                }
               if(previous_leave==null){
                  previous_leave=0;
                }

              $('.previous_el_balance').text(previous_leave);
              $('.current_el_balance').text(current_leave);
              
              console.log('Current Leave'+current_leave); 
              $('.currentLeave').text(current_leave + ' / 10');

            }else{
                if(previous_leave==null){
                  previous_leave=0;
                }
               $('.previous_el_balance').text(previous_leave);

              // If Exception Adjustment Date Occur
              if(data[0].adjustment_day > 0){
                if(current_leave==null){
                  current_leave=0;
                }
                $('.current_el_balance').text(current_leave);
              }else{
                if(previous_leave==null){
                  previous_leave=0;
                }
                $('.current_el_balance').text(previous_leave);
              }
              if(previous_leave==null){
                previous_leave=0;
              }
              $('.currentLeave').text(previous_leave + ' / 10');
            }
            


          }

       }
    });

      $.ajax({
           type:"GET",
           cache:true,
           data:{ 
            "date":date,
            "staff_id":staffID,
           },
           url:url+'/masterLayout/getLeaveApprovalUpdate',
           success:function(e){
             setTimeout(function(){
              debugger

               var data = JSON.parse(e);
               var expected_time_in=localStorage.getItem('expected_time');
               var expected_time_out=localStorage.getItem('expected_time_out');
                localStorage.setItem('expected_time','');
                localStorage.setItem('expected_time_out','');
              if(data.length != 0){

                   if(data[0].actual_time_from=="00:00:00"){
                        var range=[expected_time_in,expected_time_out];

                  }else{
                        var time_from=timeToMinute(data[0].actual_time_from);
                        var time_to=timeToMinute(data[0].actual_time_to);
                  }

                  
                   if(data[0].actual_time_from=="00:00:00"){
                      var range=[expected_time_in,expected_time_out];

                  }else{
                    var range=[timeToMinute(data[0].actual_time_from),timeToMinute(data[0].actual_time_to)];
                  }
                  debugger;
                 if(data[0].paid_percentage==0){
                   leaveAllocatedTap(range,[false, true, false],['white-color','white-color','green-color'],[window.range_start,window.range_end]);
                 }else if(data[0].paid_percentage==50){
                   leaveAllocatedTap(range,[false, true, false],['yellow-color','yellow-color','green-color'],[window.range_start,window.range_end]);
                 }else if(data[0].paid_percentage==100){
                   leaveAllocatedTap(range,[false, true, false],['black-color','black-color','green-color'],[window.range_start,window.range_end]);
                 }
                 // else{
                 //   leaveAllocatedTap([0,0],[false, true, false],['black-color'],[window.range_start,window.range_end]);
                 // }
             }else{
                   leaveAllocatedTap([0,0],[false, true, false],['black-color'],[window.range_start,window.range_end]);

             }
             
             },2000)

           }
       })
 



    // Asim Daily Report

 }
 



  // ================ Weekly Slider ========================//
 //=====================================================//

 var weeklyTapInTapOut = function(tap,connect1,range){
       debugger;
       var slider = document.getElementById('weeklySlider');
       slider.noUiSlider.updateOptions({
       start: tap,
       connect:connect1,
       range: {
         'min': parseInt(range[0]),
         'max': parseInt(range[1])
       },
       tooltips: [true, true]

       });

          var connect = slider.querySelectorAll('.noUi-connect');
          var classes = ['green-color'];

          for ( var i = 0; i < connect.length; i++ ) {
              connect[i].classList.add(classes[i]);
          }


 }

 //====================== Actual TapIn And Actual TapOut ==============//
 //===============================================================//

 

    var actualTapInTapOut = function(time,connect1,classes,uihandle,tooltip,range){

                 console.log('time_actual_tap'+time);
                 setTimeout(function(){
                   getAllTimes= window.myTime;
                    // for (var i =0; i<getAllTimes.length; i++) {
                    //   console.log('i'+'test'+getAllTimes[i])
                    // }
                    a=2;
                    $.each( getAllTimes, function( i, l ){
                      $('.noUi-tooltip').eq(a+i).text(l);
                    console.log( "Index #" + i + ": " + l );
                  });

                   // $('.Out').last().text(window.FinalTimeOut);
                 },100)
                 console.log('connect1_actual_tap'+connect1)
                 console.log('classes_actual_tap'+classes) 

                tapSlider.noUiSlider.destroy();
                var slider = document.getElementById('tapSlider');
                noUiSlider.create(slider,{
                  start: time,
                  connect: connect1,
                  range: {
                    'min': parseInt(range[0]),
                    'max': parseInt(range[1])
                  },
                  tooltips:true,
                  pips: {
                    mode: 'steps',
                    //values: [0, 720, 1439],
                    filter: function filter(value, type) {
                     console.log(type+'-value-'+value+'-value%60-'+value % 60);
                         return value % (60 * 2) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
                    },
                    //density: 2,
                    format: {
                      to: function to(value) {
                        if (value % (60 * 2) === 0) {
                          return moment().startOf('day').add(value, 'minutes').format('HH:mm:ss');
                        }
                        return '';
                      },
                      from: function from(value) {
                        return value;
                      }
                    }
                  },
                  format: {
                    to: function to(value) {
                      //return value + ',-';
                      return moment().startOf('day').add(value, 'minutes').format('HH:mm:ss');
                    },
                    from: function from(value) {
                      return value;
                    }
                  }

        });
 
          var connect = slider.querySelectorAll('.noUi-connect');
          var anchorhandle = slider.querySelectorAll('.noUi-handle');
          console.log(slider.querySelectorAll('.noUi-tooltip'));
          var tool = slider.querySelectorAll('.noUi-tooltip');


       for ( var i = 0; i < connect.length; i++ ) {
            console.log(classes[i]);

           connect[i].classList.add(classes[i]);
       }

       for ( var i = 0; i < anchorhandle.length; i++ ) {
                    console.log(uihandle[i]);
           anchorhandle[i].classList.add(uihandle[i]);
       }

       for ( var i = 0; i < tool.length; i++ ) {
            console.log(tooltip[i]);
           tool[i].classList.add(tooltip[i]);
       }
    }


    // Leave Allocation Tap

    

     var leaveAllocatedTap = function(tap,connect,classLeaveBar,range){

        if(typeof LeaveBar != undefined){
                LeaveBar.noUiSlider.destroy();
        }
       var  leaveBar = document.getElementById('LeaveBar');
       noUiSlider.create(leaveBar, {
       start: tap,
       connect:connect,
       tooltips:true,
       range: {
         'min': parseInt(range[0]),
         'max': parseInt(range[1])
       },
       format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
       }
       });

        var connect = leaveBar.querySelectorAll('.noUi-connect');

        for ( var i = 0; i < connect.length; i++ ) {
           connect[i].classList.add(classLeaveBar[i]);
        }
      }




          //=============== Absentia Allocated =======================//
    //=======================================================//

    var absentiaAllocatedTap = function(tap,connect,range){

      debugger;
       AiAabsentia.noUiSlider.destroy();
       var  aiAabsentia = document.getElementById('AiAabsentia');
       noUiSlider.create(AiAabsentia, {
       start: tap,
       connect:connect,
       tooltips:true,
       range: {
         'min': parseInt(range[0]),
         'max': parseInt(range[1])
       },
       format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
       }
       });


    }

function absentiaFormSignal(){
  var absentia_slider=$('#AiAabsentia').find('.noUi-connect').css('left');
  window.absentia=false;

  if(absentia_slider!=undefined){
  if(parseInt(absentia_slider.split('px')[0])>0){
      window.absentia=true;
    }
  }
return window.absentia;
}



    //====================== Buffer In Buffer Out ======================//
    //=================================================================//
    

    var bufferInOut = function(tap,connect1,tooltip1,bufferUsed){
       bufferTime.noUiSlider.destroy();
       var buffer = document.getElementById('bufferTime');
          noUiSlider.create(buffer, {
          start: tap,
          tooltips: tooltip1,
          connect:connect1,
          range: {
            'min': 360,
            'max': 1000,
          },
          format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
          }
       });

       var connect = bufferTime.querySelectorAll('.noUi-handle');
       for ( var i = 0; i < connect.length; i++ ) {
           connect[i].classList.add('no-anchor');
       }

                // Minutes Show In ToolTips
       var tool = bufferTime.querySelectorAll('.noUi-tooltip');
       for(var i = 0 ; i < tool.length;i++){
          tool[i].innerHTML = bufferUsed[i]+' min';
       }


    }

    //================= PayRoll Attendance ========================//
    //=============================================================//

    function PayRollAttendanceSlider(payRollAttendanceArray,connectPayRoll,classPayRoll,range){
      // debugger;
           if(payrollSlider != undefined){
            if(payrollSlider.noUiSlider!=undefined){
                              payrollSlider.noUiSlider.destroy();

            }
           }
                        //  payrollSlider.noUiSlider.destroy();

          var PayrollSliderCreate1 = document.getElementById('PayrollAttendance');
          noUiSlider.create(PayrollSliderCreate1, {
          start: payRollAttendanceArray,
          tooltips: true,
          connect:connectPayRoll,
          range: {
            'min': parseInt(range[0]),
            'max': parseInt(range[1]),
          },
          format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
          }
       });

         var connect = PayrollSliderCreate1.querySelectorAll('.noUi-connect');

         for ( var i = 0; i < connect.length; i++ ) {
             connect[i].classList.add(classPayRoll[i]);
         }
    }

 

   function getLeaveDailyReport(staff_id, date, dailyReportData) {

       // Weekly Time Sheet
       var weekly_time_sheet_in = timeToMinute(dailyReportData[0].day_time_in);
       var weekly_time_sheet_out = timeToMinute(dailyReportData[0].day_time_out);

       var range = [];
       if (weekly_time_sheet_in && weekly_time_sheet_out) {
           range.push(parseInt(parseInt(weekly_time_sheet_in) - parseInt(60)));
           range.push(parseInt(parseInt(weekly_time_sheet_out) + parseInt(60)));
       } else {
           range.push(360);
           range.push(1000);
       }

       var data;
       $.ajax({
           type: "POST",
           cache: false,
           data: {
               'staff_id': staff_id,
               'date': date,
               "_token": csrf
           },
           url: url+'/masterLayout/staff/getleaveUpdate',
           success: function(e) {
               data = JSON.parse(e);

               // Absentia Allocated

               var leave_time = data[0].leave_time;
               var leave_flag = data[0].leave_time_code;
               var classleave = [];

               if (leave_time != null && leave_time) {
                   leave_time = leave_time.split(',');
                   var leave_time_allocated = timeToMinuteForArray(leave_time);
               } else {
                   leave_time = '';
               }

               if (leave_flag != null && leave_flag) {
                   leave_flag = leave_flag.split(',');
               }

               if (leave_flag && dailyReportData[0].holiday == null) {

                   var connect_leave = [false];

                   for (var i = 0; i < leave_flag.length; i++) {

                       // For 100 % leave compensation
                       if (leave_flag[i] == '10o') {
                           connect_leave.push(true);
                           classleave.push('black-color');
                       }

                       // For 50 % Leave compensation

                       if (leave_flag[i] == '5o') {
                           connect_leave.push(true);
                           classleave.push('yellow-color');
                       }

                       // For 0% Leave Compensation

                       if (leave_flag[i] == '0o') {
                           connect_leave.push(true);
                           classleave.push('white-color');
                       }


                       if (leave_flag[i] == '10i' || leave_flag[i] == '5i' || leave_flag[i] == '0i') {
                           connect_leave.push(false);
                       }
                   }

                   leaveAllocatedTap(leave_time_allocated, connect_leave, classleave, range);
               }else if(dailyReportData[0].holiday != null && dailyReportData[0].holidayflag == 0 && leave_flag) {
                   leaveAllocatedTap([0, 0, 0, 0], false, [0], [360, 960]);
                   $('#LeaveBar').addClass('noShow');

               }else if(dailyReportData[0].holiday != null && dailyReportData[0].holidayflag == 1 && leave_flag){

                  var connect_leave = [false];

                   for (var i = 0; i < leave_flag.length; i++) {

                       // For 100 % leave compensation
                       if (leave_flag[i] == '10o') {
                           connect_leave.push(true);
                           classleave.push('black-color');
                       }

                       // For 50 % Leave compensation

                       if (leave_flag[i] == '5o') {
                           connect_leave.push(true);
                           classleave.push('yellow-color');
                       }

                       // For 0% Leave Compensation

                       if (leave_flag[i] == '0o') {
                           connect_leave.push(true);
                           classleave.push('white-color');
                       }


                       if (leave_flag[i] == '10i' || leave_flag[i] == '5i' || leave_flag[i] == '0i') {
                           connect_leave.push(false);
                       }
                   }

                   leaveAllocatedTap(leave_time_allocated, connect_leave, classleave, range);

               }else{
                   leaveAllocatedTap([0, 0, 0, 0], false, [0], [360, 960]);
                   $('#LeaveBar').addClass('noShow');
               }

           }

       });


   }


 var timeToMinute = function(hms){
    var a = hms.split(':'); // split it at the colons

    var minutes = (+a[0]) * 60 + (+a[1]);

    var convert = minutes;

    return convert;
 }


 function timeToMinuteForArray(time){


    //var hms = time;   // your input string
    var min = [];
    console.log(time);
    console.log(time.length);
    for(var i =0 ; i < time.length;i++){
    var a = time[i].split(':'); // split it at the colons

    // Hours are worth 60 minutes.
    var minutes = (+a[0]) * 60 + (+a[1]);

    min.push(minutes);

    }

    console.log(min);

    return min;

 }
