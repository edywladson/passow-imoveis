$(function () {
    var effecttime = 200;

    // scroll animate
    $("[data-go]").click(function (e) {
        e.preventDefault();

        var goto = $($(this).data("go")).offset().top;
        $("html, body").animate({scrollTop: goto}, goto / 2);
    });

    $(".btnGoal").click(function (e) {
        e.preventDefault();
        var goal = $(this).data("goal");

        if (goal == 'Venda') {
            $('.value_sale').show();
            $('.value_rent').hide();
        } else {
            $('.value_sale').hide();
            $('.value_rent').show();
        }

        $('.goal').val(goal);
        $(".btnGoal").removeClass('active');
        $(this).addClass('active');
    });

    /*
     * AJAX FORM
     */
    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    load.fadeOut(200);
                }

                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                            .find("." + flashClass).effect("bounce", 300);
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });
    });
});