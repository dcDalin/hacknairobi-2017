</body>
<script
    src="https://code.jquery.com/jquery-1.11.1.min.js"
    integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE="
    crossorigin="anonymous">
</script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/register.js"></script>
<script src="assets/js/add-question.js"></script>
<script src="assets/js/answer-question.js"></script>
<script src="assets/js/new-video.js"></script>
<script>
$(function() {
  $(".video").click(function () {
    var theModal = $(this).data("target"),
    videoSRC = $(this).attr("data-video"),
    videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
    $(theModal + ' iframe').attr('src', videoSRCauto);
    $(theModal + ' button.close').click(function () {
      $(theModal + ' iframe').attr('src', videoSRC);
    });
  });
});
</script>
</html>
