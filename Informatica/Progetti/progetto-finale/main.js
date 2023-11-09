var app = new Vue({
    el: '#vue-container',
    data: {
        title: 'Coding Week',
        ricerca: '',
        videogames: [
          {name: "Alessio"},
          {name: "Nicholas"}
        ]
    },
    methods: {
        esegui_ricerca() {
            axios.get('https://api.rawg.io/api/games', {
                params: {
                    key: api_key,
                    search: this.ricerca
                }
            }).then(function(risultato) {
                app.videogames = risultato.data.results;
            });
        }
    }
});
