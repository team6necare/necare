<!DOCTYPE html>
<html lang="en">
<head>
<title>
</title>
</head>
<body>
<table class="table table-bordered table-hover">
		<tr>
			<th>Activity Refno</th>
            <th>Activity Description</th>
			<th>Location</th>
			<th>Start DateTime</th>
			<th>End DateTime</th>
			<th>Status</th>
			<th>Cost ($)</th>
			
		</tr>
	@foreach ($activities as $key => $activity)
	<tr>
		<td>{{ $activity->activity_refno }}</td>
        <td>{{ $activity->description }}</td>
		<td>{{ $activity->location->name}}</td>
		<td>{{ $activity->start_datetime }}</td>
		<td>{{ $activity->end_datetime }}</td>
		<td>{{ $activity->status}}</td>
		<td>{{ $activity->cost}}</td>
		
	</tr>
	@endforeach
	</table>          

</body>
</html>