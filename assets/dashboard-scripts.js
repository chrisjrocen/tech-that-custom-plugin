(function ($) {
  $(function () {
    var init = function () {
      countClicks();
    };

    let countClicks = () => {
      let count = 0;
      $("#custom_button").on("click", function () {
        let value_count = $("#admin_clicks").html();
        value_count = Number(value_count);
        count = value_count += 1;

        $("#admin_clicks").html(count);
        let data = {
          action: "kc_admin_count_btn_clicks",
          current_admin_value: count,
        };

        $.post(kanzuAdminTechThat.ajaxUrl, data, (response) => {
          console.log("clicked:-  ", count);
        });
      });
    };
    init();
  });
})(jQuery);
