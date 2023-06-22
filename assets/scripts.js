(function ($) {
  $(function () {
    var init = function () {
      countClicks();
    };

    let countClicks = () => {
      $("#tech_btn").on("click", function () {
        let data = {
          action: "kc_count_btn_clicks",
          current_value: 0,
        };

        $.post(kanzuTechThat.ajaxUrl, data, (response) => {
          alert("YES");
        });
      });
    };
    init();
  });
})(jQuery);
