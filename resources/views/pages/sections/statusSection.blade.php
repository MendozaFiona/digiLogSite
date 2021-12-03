@php
   use App\Models\Office;
   use Illuminate\Support\Facades\Auth;
@endphp

<div class="container pt-3 pb-5">
    <div id="status" class="text-center pb-5">Office Status: {{Office::officeStatus(Auth::user()->office_id)}}</div>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <a id = "away" class="btn btn-secondary btn-lg btn-block" style = "background-color: #C4C4C4">AWAY</a>
        </div>
        <div class="col">
            <a id = "available" class="btn btn-success btn-lg btn-block" style = "background-color: #42CD3F">AVAILABLE</a>
        </div>
        <div class="col"></div>
    </div>
</div>

<script>
    var officeID = {{ (Auth::user()->office_id) }};

    document.getElementById("away").onclick = function () {
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

    document.getElementById("available").onclick = function () {

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
</script>