@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://cdlworker.com/assets/img/logo/medium/logo.png" class="logo" alt="CDLWorker">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
