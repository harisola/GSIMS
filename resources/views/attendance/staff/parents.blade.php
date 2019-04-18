<div class="col-md-12" id="parents_data">
    <div class="col-md-6 text-center">
        <!-- <img src= "http://10.10.10.63/gs/assets/photos/sis/150x150/father/166309.png" class="imageCenterDefaultParent" /> -->
        <!-- {{$stdfamilyinfo["family"][2]->gr_no}} -->
        <img id="fatherimg" src="{{ $fatherpic }}" class="imageCenterDefaultParent" />
        <h5 class="father_name">{{ $Father_name }}</h5>
    </div><!-- col-md-6 -->
    <div class="col-md-6 text-center">
        <!-- <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/mother/166309.png" class="imageCenterDefaultParent"> -->
        <img id="motherimg" src="{{ $motherpic }}" class="imageCenterDefaultParent" />
        <h5 class="mother_name">{{ $Mother_name }}</h5>
    </div><!-- col-md-6 -->
</div><!-- col-md-12 -->
<hr />
<div class="col-md-12 text-center">
    <ul class="childList">
    @if(empty($stdfamilyinfo["student"]))
    <!-- <ul class="childList"> -->
        <li class="eachChild">
            <span class="childInfo">
                <img id="child1_img" src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/NoPic.png" class="imageCenterDefaultChild">
                <span class="ChildName ">Child Name Not Found</span><br />
                <span class="childGS">Null</span> | <span class="stuStatus">Null</span>
            </span><!-- childInfo -->
        </li><!-- eachChild -->
    <!-- </ul> -->
    @else
    <!-- <ul class="childList"> -->
        @foreach ($stdfamilyinfo["student"] as $student)
        <li class="eachChild">
            <span class="childInfo">
                <img id="child1_img" src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/{{ $student->gr_no }}.png" class="imageCenterDefaultChild">
                <span class="ChildName ">{{ $student->official_name }}</span><br />
                <span class="childGS">{{ $student->gs_id }}</span> | <span class="stuStatus">{{ $student->std_status_code }}</span>
            </span><!-- childInfo -->
        </li><!-- eachChild -->
        @endforeach
    <!-- </ul> -->
    @endif

    </ul> <!-- ul -->
    <h2 style="font-weight:normal;color:#000;" class="text-center" id="parent_tapin_name">Parent DayPass </h2>
    <div class="timeShow OUT text-center" id="parent_tapout_time">TIME OUT : {{$time}}</div>
</div><!-- col-md-12 -->
<hr />