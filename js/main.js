// A $( document ).ready() block.
$( document ).ready(function() {
    

    $('#start_fight').on('click', function() {
        console.log("the fight must start")

        $.ajax({
            url: 'Play.php',
            data: { action: 'start-fight' },
            type: 'post',
            success: function (output) {
                let response = $.parseJSON(output);

                    UpdateStats.prototype.updateStats('hero', response['data']['hero'])
                    UpdateStats.prototype.updateStats('enemy', response['data']['enemy'])
            }
        });
    })

    $('#attack').on('click', function () {
                $.ajax({
                    url: 'Play.php',
                    data: {
                        action: 'attack'
                    },
                    type: 'post',
                    success: function (output) {
                        console.log(output)
                    }
                });
    })
    
    $('#surrender').on('click', function () {
        console.log("surrender")
    })   
    
    $('#heal').on('click', function () {
        console.log("heal")
    })      
});