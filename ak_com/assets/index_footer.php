<!--Style for Top Scroll Button-->
<style>
    #back2Top {
    width: 40px;
    line-height: 40px;
    overflow: hidden;
    z-index: 999;
    display: none;
    cursor: pointer;
    -moz-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
    position: fixed;
    bottom: 50px;
    right: 0;
    background-color: #DDD;
    color: #555;
    text-align: center;
    font-size: 30px;
    text-decoration: none;
}
#back2Top:hover {
    background-color: #DDF;
    color: #000;
}
</style>
<!--JS for Top Scroll Button-->
<script>
    /*Scroll to top when arrow up clicked BEGIN*/
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 100) {
                $('#back2Top').fadeIn();
            } else {
                $('#back2Top').fadeOut();
            }
        });
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });
         /*Scroll to top when arrow up clicked END*/

</script>

<footer>
    <!--top Scroll Button-->
    <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    <!--Footer Content-->
    <nav class="navbar navbar-default navbar-fixed-bottom" style="padding-top:3px !important; padding-bottom:3px !important; min-height:32px !important">
      <div class="container">
        <p> Copy right : Anandkunj: <a href="http://urinecure.org/">
        http://urinecure.org</a> &nbsp;&nbsp;&nbsp; Contact: drsarangpatil@gmail.com</p>
      </div>
    </nav>    
</footer>