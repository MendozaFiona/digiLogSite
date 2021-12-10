@php
   use App\Models\Office;
   use Illuminate\Support\Facades\Auth;
@endphp

<div class="container pt-3 pb-5">
    <div id="status" class="text-center pb-5">Office Status: {{Office::officeStatus(Auth::user()->office_id)}}</div>
</div>

<!--<script>
    var officeID = auth inside brackers;

    document.getElementById("").onclick = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        jQuery.ajax({
            url: '/offices/' + officeID,                                    
            method: 'POST',
            data: {
                status: "offline",
                '_method': 'PATCH',
            },
            success: function(result){  
                document.getElementById("status").innerText = "Office Status: offline";
            }});
    };

    document.getElementById("").onclick = function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        jQuery.ajax({
            url: '/offices/' + officeID,
            method: 'POST',
            data: {
                status: "online",
                '_method': 'PATCH',
            },
            success: function(result){
                document.getElementById("status").innerText = "Office Status: online";
            }});
    };
</script>-->