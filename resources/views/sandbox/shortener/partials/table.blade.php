<table class="table table-striped">
		<tr>
			<th>Short URL</th>
			<th>Long URL</th>
			<th>Country</th>
			<th>User Agent</th>
			
		</tr>
				
		@foreach ($shorturls as $url)
			@foreach($url->clicksInfo as $info)
			<tr >
				<td> {{$url->short_url or ''}}</td>
				<td> {{$url->long_url or ''}}</td>
				<td> {{$info->country or ''}}</td>
				<td> {{$info->ua or ''}}</td>
			</tr>	
			@endforeach
		@endforeach
				
	</table>