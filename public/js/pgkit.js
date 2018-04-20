
$(function () {
    $('#table-tabs li a').on('click', function () {
        localStorage.setItem('tab-index', $(this).parent().index())
    })
})
