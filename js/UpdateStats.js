function UpdateStats() {
    
}

UpdateStats.prototype.updateStats = function(type, stats) {

    for(let i in stats) {
        let id = '#'+type + '-' + i+'-id';
        $(id).text(stats[i]);
        
    }
}