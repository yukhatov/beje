$(document).ready(function() {
    $('#tasks').DataTable( {
        "lengthMenu": [[3, -1], [3, "All"]]
    } );
} );

// When the user clicks on <div>, open the popup
function showPopup() {
    $('#preview-username').text($('#username-input').val());
    $('#preview-email').text($('#email-input').val());
    $('#preview-description').text($('#description-input').val());

    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}