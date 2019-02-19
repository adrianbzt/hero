// A $( document ).ready() block.
$( document ).ready(function() {
    

    $('#start_fight').on('click', function() {
        console.log("the fight must start")

        $.ajax({
            url: 'Play.php',
            data: { action: 'start-fight' },
            type: 'post',
            success: function (output) {
                console.log(output)
            }
        });
    })

    $('#attack').on('click', function () {
        console.log("attack")
    })
    
    $('#surrender').on('click', function () {
        console.log("surrender")
    })   
    
    $('#heal').on('click', function () {
        console.log("heal")
    })      
});