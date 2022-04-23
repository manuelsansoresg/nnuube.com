$(function () {
    if (document.getElementById('rateYo')) {
        $("#rateYo").rateYo({
            rating: 0,
            fullStar: true,
            onSet: function (rating, rateYoInstance) {
                let title_id = $('#title_id').val();
                rate(title_id, rating);
            }
        });

        var rateMyTitle = $('#rateMyTitle').val();

        $("#rateTitle").rateYo({
            rating: rateMyTitle,
            fullStar: true,
            readOnly: true

        });

        window.rate = function (title_id, rate) {
            axios.get('/titulo/' + title_id + '/' + rate + '/rate')
                .then(function (response) {
                    let result = response.data;
                    console.log(result);
                    Livewire.emit('setRate', title_id)

                })
                .catch(function (err) {
                    console.log(err);
                });

        }

        window.Livewire.on('setRateJavascript', rate => {
            $("#rateTitle").rateYo("option", "rating", rate);
        })
    }





});