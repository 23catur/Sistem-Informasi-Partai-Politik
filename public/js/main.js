const Loading = {
    show: function() {
        document.querySelector('#loading').classList.remove('hidden');
    },
    hide: function() {
        document.querySelector('#loading').classList.add('hidden');
    }
}

$(document).ready(function () {
    setTimeout(() => Loading.hide(), 100);

    $('#mailBtn').on('click', function () {
        Loading.show()
        setTimeout(() => Loading.hide(), 100);
    })
})
