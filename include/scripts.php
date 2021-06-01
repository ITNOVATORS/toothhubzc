
<script>
	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
</script>

<script>

//no sunday and friday
    $(document).ready(function(){
        $("#datepicker").datepicker({
            beforeShowDay:date
        });
       
        function date (date){
            var day = date.getDay();
            return [(day != 0 && day !=5)];
        };
    });


</script>

<script src="js/smooth-scroll.js"></script>

<script>
    var scroll = new SmoothScroll('a[href*="#"]');
</script>

<script src="js/sweetalert.min.js"></script>

  <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            });
        </script>
        <?php
         unset($_SESSION['status']);
    }
    ?>