(function ($) {
  $(function () {
    var init = function () {
      countClicks();
    };

    let countClicks = () => {
      let count = 0;
      $("#tech_btn").on("click", function () {
        let value_count = $("#display_clicks").html();
        value_count = Number(value_count);
        count = value_count += 1;

        $("#display_clicks").html(count);
        let data = {
          action: "kc_count_btn_clicks",
          current_value: count,
        };

        $.post(kanzuTechThat.ajaxUrl, data, (response) => {
          console.log("clicked:-  ", count);
        });
      });
    };
    init();
  });
})(jQuery);
