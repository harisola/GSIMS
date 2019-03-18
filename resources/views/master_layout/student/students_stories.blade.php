<?php if( !empty( $stories ) ){ ?>

@foreach ($stories as $student)


	@if($login_user != $student->user_id)
	
	<li class="in">
		<img class="avatar" alt="" src="{{ $student->photo150 }}">
		<div class="message"><span class="arrow"> </span>
			<div class="CommentInfo">
				<a href="javascript:;" class="name"> <strong>{{ $student->staff_name  }}</strong> </a>
				<span class="studentInfoCom"><span class="grayish">Student Name:</span> {{ $student->abridged_name }} </span>
				<span class="studentInfoCom"><span class="grayish">GS-ID:</span> {{ $student->gs_id }} </span>
				<span class="body"><span class="grayish">Comment:</span> {{ $student->comments }} <br> </span>
				<?php $tags =  explode(',', $student->tag); $c_tags =  explode(',', $student->communication_tag); ?>
					@foreach ($tags as $tag)
					<span class="commentCat TPA Confirmed "> {{ $tag }} </span>
					@endforeach
					<!-- @foreach ($c_tags as $tag) -->
					<?php /*if($tag != '') {*/ ?>
						<!-- <span class="commentCat communicationCat TPA Confirmed "> {{ $tag }} </span> -->
					<?php /*}*/ ?>
					<!-- @endforeach -->
				<br>                                            
				<span class="commentDate"> {{ $student->date_time }} </span>
			</div>
		</div>
	</li>


	@else

	<li class="out" data-filters="User Generated" data-category="Accounts">
		<img class="avatar" alt="" src="{{ $student->photo150 }}">
		<div class="message"><span class="arrow"> </span>
			<div class="CommentInfo">
				<a href="javascript:;" class="name"> <strong>{{ $student->staff_name  }}</strong> </a>
				<span class="studentInfoCom"><span class="grayish">Student Name:</span> {{ $student->abridged_name }} </span>
				<span class="studentInfoCom"><span class="grayish">GS-ID:</span> {{ $student->gs_id }} </span>
				<span class="body"> {{ $student->comments }} <br> </span>
				<?php $tags =  explode(',', $student->tag); $c_tags =  explode(',', $student->communication_tag); ?>
					@foreach ($tags as $tag)
					<span class="commentCat TPA Confirmed "> {{ $tag }} </span>
					@endforeach
					@foreach ($c_tags as $tag)
					<?php if($tag != '') { ?>
						<span class="commentCat communicationCat TPA Confirmed "> {{ $tag }} </span>
					<?php } ?>
					@endforeach
				<br> 
				<span class="commentDate"> {{ $student->date_time }} </span>
			</div>
		</div>
	</li>
	@endif
	
	@endforeach

<?php } ?>
