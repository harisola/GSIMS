<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>HR Adjustment Cycle</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>


<style type="text/css">
#AdjustmentCycleTable {
  width: 100%;
  vertical-align: middle;
}  
#AdjustmentCycleTable tr td {
  vertical-align: middle;
}
#AdjustmentCycleTable tr td:first-child {
  /* font-size: 18px; */
}
#AdjustmentCycleTable tr td:nth-child(2n) {
  width: 200px;
}
#AdjustmentCycleTable tr td:nth-child(3n) {
  width: 140px;
}
.monthDate select {
    width: 80px !important;
}
.monthDate span {
  width: 100px;
  text-align: left;
}
.freezeDays select {
    width: 60px !important;
}
.freezeDays span {
  width: 50px;
  text-align: left;
}
</style>

<!-- BEGIN USE PROFILE -->
<div class="row " style="margin: 20px 0 0 0 !important;">
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-setting"></i>HR Adjustment Cycle </div>
            <?php /*
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
            */?>
        </div>
        <div class="portlet-body form fixed-height">
            <form>
              <div class="form-body">
                <table class="table table-striped table-bordered" id="AdjustmentCycleTable">
                  <thead>
                    <tr>
                      <th>for the Month of</th>
                      <th>Cut-off Date</th>
                      <th>Freeze after</th>
                      <th>Adjustment cycle Form - To</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>July</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control " id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of July
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>01 Jul - 20 Jul</td>
                    </tr><!-- July -->
                    <tr>
                      <td>August</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control " id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15" selected="">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of August
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 Jul - 15 Aug</td>
                    </tr><!-- August -->
                    <tr>
                      <td>September</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                            </select>
                            <span class="input-group-addon">
                                of September
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>16 Aug - 20 Sep</td>
                    </tr><!-- September -->
                    <tr>
                      <td>October</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control " id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17" selected="">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of October
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 Sep - 17 Oct</td>
                    </tr><!-- October -->
                    <tr>
                      <td>November</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                            </select>
                            <span class="input-group-addon">
                                of November
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>18 Oct - 20 Nov</td>
                    </tr><!-- November -->
                    <tr>
                      <td>December</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of December
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 Nov - 20 Dec</td>
                    </tr><!-- December -->
                    <tr>
                      <td>January</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of January
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 Dec - 20 Jan</td>
                    </tr><!-- January -->
                    <tr>
                      <td>February</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28" selected="">28</option>
                            </select>
                            <span class="input-group-addon">
                                of February
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>20 Jan - 28 Feb</td>
                    </tr><!-- February -->
                    <tr>
                      <td>March</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of March
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>01 Mar - 20 Mar</td>
                    </tr><!-- March -->
                    <tr>
                      <td>April</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                            </select>
                            <span class="input-group-addon">
                                of April
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 Mar - 20 Apr</td>
                    </tr><!-- April -->
                    <tr>
                      <td>May</td>
                      <td>
                        <div class="input-group monthDate">
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20" selected="">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            <span class="input-group-addon">
                                of May
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 Apr - 20 May</td>
                    </tr><!-- May -->
                    <tr>
                      <td>June</td>
                      <td>
                        <div class="input-group monthDate"> 
                            <select class="form-control" id="">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31" selected="">31</option>
                            </select>
                            <span class="input-group-addon">
                                of June
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                            <select class="form-control" id="">
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <span class="input-group-addon">
                                days
                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>21 May - 30 June</td>
                    </tr><!-- June -->
                  </tbody>
                </table><!-- AdjustmentCycleTable -->
              </div><!-- form-body -->
              <div class="form-actions text-center">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="submit" class="btn blue" id="btnSubmit">
                        <i class="fa fa-check"></i> Save</button>
                </div>
            </form>
            <!-- BEGIN FORM-->
            <?php /* code from k.solangi commneted 
            <form action="#" class="horizontal-form">
                <div class="form-body">

                    <div class="alert alert-success" id="success-alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        Data saved.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">From</label>
                                <div class="input-group">
                                    <select class="form-control" id="day_from">
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                      <option value="25">25</option>
                                    </select>
                                    <span class="input-group-addon">
                                        of every month
                                    </span>
                                </div><!-- input-group -->
                                
                                <span class="help-block"> Payroll month start from </span>
                            </div><!-- form-group -->
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">To</label>
                                <div class="input-group">
                                    <select class="form-control" id="day_to">
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                      <option value="25">25</option>
                                    </select>
                                    <span class="input-group-addon">
                                        of every month
                                    </span>
                                </div><!-- input-group -->
                                
                                <span class="help-block"> Payroll month ends at</span>
                            </div><!-- form-group -->
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Adjustments</label>
                                <div class="input-group">
                                    <select class="form-control" id="day_buffer">
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                    </select>
                                    <span class="input-group-addon">
                                        days
                                    </span>
                                </div><!-- input-group -->
                                
                                <span class="help-block"> freeze adjustments for Payroll after month ends </span>
                            </div><!-- form-group -->
                        </div>
                        <!--/span-->
                    </div>
                    
                </div>
                <div class="form-actions text-center">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="submit" class="btn blue" id="btnSubmit">
                        <i class="fa fa-check"></i> Save</button>
                </div>
            </form>
            */ ?>
            <!-- END FORM-->
        </div>
    </div>
</div><!-- row -->







<script type="text/javascript">
$('#day_from').val(<?php echo $pageData[0]->lock_day_start; ?>);
$('#day_to').val(<?php echo $pageData[0]->lock_day_end; ?>);
$('#day_buffer').val(<?php echo $pageData[0]->lock_day_buffer; ?>);

$('#btnSubmit').click(
  function(event){
    event.preventDefault();
    var day_from = $('#day_from').val();
    var day_to = $('#day_to').val();
    var day_buffer = $('#day_buffer').val();

    var token = "<?php echo e(csrf_token()); ?>";

    $.ajax({
      type: "POST",
      url: "<?php echo e(url('/hr_save_configurations')); ?>",
      data: {
          _token: token,
          day_from: day_from,
          day_to: day_to,
          day_buffer:day_buffer
      },
      success: function(data)
      {
          //console.log('From: ' + day_from);
          //console.log(data);
          $("#success-alert").show();
          $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
              $("#success-alert").slideUp(500);
          });
      }
  });     
  }
);
</script>