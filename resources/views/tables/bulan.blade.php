<div>

    @php
    $timestamp = strtotime($getState);
    $bulan = date('M', $timestamp);
    
  
    @endphp
   <b>{{$bulan}}</b>
</div>