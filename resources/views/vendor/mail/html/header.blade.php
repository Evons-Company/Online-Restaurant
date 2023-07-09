@props(['url'])
<tr>
<td class="header">
<a href="https://www.evonscompany.com" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('admin/evons.png') }}" class="logo" alt="Evons company">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
