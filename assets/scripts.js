(function ($) {
  $(function () {
    var init = function () {
      countClicks();
    };

    let countClicks = () => {
      $("#tech_btn").on("click", function () {
        let count = 0;
        let value_count = $("#display_clicks").val();
        console.log("----", value_count);
        $("#display_clicks").html(99);

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
