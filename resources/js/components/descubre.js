$(function () {
    if(document.getElementById('rnd-title')) {
        
        var seconds              = 2000;
        var total_second_profile = 0;
        var cont                 = 0;
        var total_titles          = 0;
        var title;
        var path = '';
        function getProfile() {
            var url = '/profile/random';
            axios.get
            (url)
                .then(function (response) {
                   
                    var result = response.data;
                    var total = result.titles.length;

                    total_second_profile = total * seconds;
                    total_titles = total;
                    title = result.titles;
                    path = result.path;

                })
                .catch(function (error) {

                })
                .then(function () {
                });
        }

        function randomProfile() {
            cont = cont + 1;

            if (cont <= total_titles){
                var image = '/' + path + '/' + title[cont-1].imagen;
                var profile = '/usuario/'+title[cont-1].id; 
                $('#rnd-title').show();
                $('#img-rand').attr('src', image);
                $('.lnk-random').attr('href', profile);
                $('#user-random').html(title[cont-1].titulo);
            }else{
                cont = 0;
                setTimeout(getProfile, total_second_profile);
            }
        }

        setTimeout(getProfile, total_second_profile);
        setInterval(randomProfile, 2000); 
    }
});