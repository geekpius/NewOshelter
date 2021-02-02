function getResults(){
    $("#spinContainer").hide().fadeIn("slow");
    input = $("#myInput");
    if(input.val() === ''){
        $("#searchContent").html(`<div class="text-center pt-2 pb-2" id="spinContainer" style="display: none">
        <i class="fa fa-spin fa-spinner"></i>
      </div>`);
        return;
    }
    $.ajax({
        url: `/help/search/${input.val()}`,
        type: "GET",
        success: function(resp){
            $("#searchContent").html(resp);
        },
        error: function(resp){
            console.log("Something went wrong");
        }
    });
}

function filterFunction() {
    getResults();
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

