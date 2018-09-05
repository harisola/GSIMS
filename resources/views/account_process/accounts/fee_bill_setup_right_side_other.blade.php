
<!--  -->
<div class="form-body">
   <h3 class="form-section">Tax setup</h3>
   <form id="tax_form" method="POST">
      <div class="row">
      <input type="hidden" name="academic_session_id" value="{{$academic_session_id}}" />
         <div class="col-md-6">
            <div class="form-group">
               <label class="control-label">Tax Amount applicable after</label>
               <div class="input-group">
                @if($tax_amount->count() > 0)
                  <input type="number" class="form-control" name="tax_amount_apply" value="{{$tax_amount[0]->tax_amount}}"/>
                @else
                <input type="number" class="form-control" name="tax_amount_apply"/>
                @endif
                  <span class="input-group-addon" style="padding: 0 5px 0 5px;">
                  <img src="img/pkr.png" width="25" />
                  </span>
               </div>
            </div>
         </div>
         <!--/span-->
         <div class="col-md-6">
            <div class="form-group">
               <label class="control-label">Tax Percentage</label>
               <div class="input-group">
                  @if($tax_amount->count() > 0)
                  <input type="number" class="form-control" name="tax_amount_per" min="0" max="100" value="{{$tax_amount[0]->tax_percentage}}"/>
                  @else
                  <input type="number" class="form-control" name="tax_amount_per" min="0" max="100"/>
                  @endif
                  <span class="input-group-addon" style="padding: 0 5px 0 5px;">
                  <img src="img/percent.png" width="25" />
                  </span>
               </div>
            </div>
         </div>
         <!--/span-->
      </div>
      <!--/row-->
      <div class="form-actions text-center">
         <button type="button" class=" btn blue" onclick="tax_form({{$academic_session_id}})">Update</button>
         <button type="button" class="btn default clearbtn">Clear</button>
      </div>
   </form>
</div>
<div id="tax_amount_callout">
</div>
<script type="text/javascript">
    var tax_form = function(academic_session_id){
        var selectedForm = $('#tax_form');
        $(selectedForm).validate({              
           rules: {
                tax_amount_apply: {
                    required: true
                },
                tax_amount_per:{
                    required:true
                }
            },
            messages: {
                tax_amount_apply:"Please enter tax amount",
                tax_amount_per:"Please enter tax amount percentage",
            }
        }).form(); ;

        if(selectedForm.valid()){
            $.ajax({
                type:"POST",
                url:"{{ url('/addTax')}}",
                data:{
                    academic_session_id:$("input[name=academic_session_id]").val(),
                    tax_amount_apply:$("input[name=tax_amount_apply]").val(),
                    tax_amount_per:$("input[name=tax_amount_per]").val(),
                    "_token": "{{ csrf_token() }}",
                },
                success:function(e){
                    $('#tax_amount_callout').css('display','');
                    $('#tax_amount_callout').html(e);
                    $('#tax_amount_callout').fadeOut(3000);
                }
            });
        }

    }
</script>