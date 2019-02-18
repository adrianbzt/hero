// A $( document ).ready() block.
$( document ).ready(function() {
    

    $('#start_fight').on('click', function() {
        console.log( "fight must start!" );

        $('body').load('Play.php');


    })
});