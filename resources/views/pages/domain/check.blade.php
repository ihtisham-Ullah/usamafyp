@extends('layout.main')


@section('content')
    <div class="container">
        <h2 class="text-center mt-5 fw-bold" style="color:#057689">Checking Of Website</h2>
        <form method="post" action="{{ route('domain.check') }}">
            @csrf

            <div class="row mt-5">
                <label for="" class="fw-1 fs-4 text-center mb-3">Enter Website Url</label>
            </div>
            <div class="row">
                <input id="websiteInput" type="text" class="w-75 m-auto form-control" name="name">
            </div>
            <div class="row">
                <button id="checkButton" class="btn btn-secondary w-25 m-auto my-3" style="background-color:#057689">Check</button>
            </div>
        </form>
            <div id="output" class="row mt-3"></div> <!-- Add this div to display the output -->

    </div>
<style>
    #output {
        background-color: #f5f5f5;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        color: #333;
    }
</style>
<script>
        // Function to retrieve the value of a cookie by its name
    function getCookie(name) {
        var cookieArr = document.cookie.split(";");

        for (var i = 0; i < cookieArr.length; i++) {
            var cookiePair = cookieArr[i].split("=");

            if (name === cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }

        return null;
    }

    // Retrieve the cookie value and display it in the "output" div on page load
    window.addEventListener("load", function() {
        var outputDiv = document.getElementById("output");
        var cookieValue = getCookie("result");

        if (cookieValue) {
            outputDiv.innerText = cookieValue;
        }
    });
    
    
    document.getElementById("checkButton").addEventListener("click", function(event) {
       // event.preventDefault(); // Prevent the default form submission

        var websiteInput = document.getElementById("websiteInput");
        var websiteUrl = websiteInput.value;

        // Do something with the websiteUrl value
        console.log(websiteUrl); // Output the value to the browser console
        
     //   alert(websiteUrl);
        document.cookie = "websiteUrl=" + websiteUrl;
        // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up the AJAX request with the query parameter
    var url = "http://" + window.location.host + "/test.php?websiteUrl=" + encodeURIComponent(websiteUrl);
    xhr.open("POST", url, true);

    // Define the callback function for when the request is complete
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = xhr.responseText;
            document.cookie = "result=" + response;
//              var outputDiv = document.getElementById("output");
//                outputDiv.innerText = response;
        }
    };

    // Send the AJAX request
    xhr.send();
    });
</script>
@endsection
