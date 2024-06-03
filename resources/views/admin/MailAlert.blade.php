@component('mail::message')
<p>{!!$name!!}</p>
<p>{!!$titre!!}</p>
<p>{!!$message!!}</p>
<p>{!!$salutation!!}</p>
<p>
	<i style="font-size: smaller;">
		<p>{!!$notezbien!!}</p>
	</i>
</p>
@endcomponent