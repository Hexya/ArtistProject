var Home = function () {
    this.searchBar = $('.search-bar');
    this.cards     = $('.container-cards');

    this.init = function () {
    }

    this.event = function () {

        this.searchBar.keyup((e) => {
            if(e.keyCode == 13) {
            this.search();
        }
        });

    }

    /**
     * @function
     * this search is a Filter function
     */
    this.search = function() {
       var myself = this;

       var filter = this.searchBar.val().toUpperCase();
       for(var i=0; i < this.cards.length ;i++) {
           var a = document.getElementsByClassName('container-cards')[i].getElementsByClassName('article-title')[0];
           if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
               myself.cards[i].style.display = 'flex';
           } else {
               myself.cards[i].style.display = 'none';
           }
       }
    }

    this.init();
    this.event();
}

module.exports = Home;

