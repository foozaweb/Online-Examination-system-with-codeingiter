$( document ).ready(function() {
    var form = $("#regForm");
    var validator = $("#regForm").validate({
        errorPlacement: function errorPlacement(error, element) { element.after(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
});