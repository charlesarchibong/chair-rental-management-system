$(function() {
    $('.orderType').change(function() {
        var orderType = $(this).val();
        if (orderType === 'both') {
            $('#orderDefault').hide();
            $('#orderChair').show();
            $('#orderTable').show();
            $('#orderTable').attr('required', true);
            $('#orderChair').attr('required', true);
            $('#orderDefault').attr('required', false);
        } else if (orderType === 'chair' || orderType === 'table') {
            $('#orderDefault').attr('required', true);
            $('#orderTable').attr('required', false);
            $('#orderChair').attr('required', false);
            $('#orderChair').hide();
            $('#orderTable').hide();
            $('#orderDefault').show();
        }
    });
    $("a[class='customerRegister']").click(function() {
        $("#customerRegister").modal("show");
        return false;
    });
    $("a[class='customerLogin']").click(function() {
        $("#customerLogin").modal("show");
        return false;
    });
});