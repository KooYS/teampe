<?php
?>

<style>

    .splash{
        background: url("<?=base_url()?>assets/images/splash/splash.png") no-repeat center;
        background-size: cover;
        position: absolute;
        top: 50%; right: 50%;
        transform: translate(50%,-50%);
        height: 100%;
        width: 100%;
    }
</style>

<!-- Views-->
<div class="views">
    <div class="view view-main splash">
        <div class="pages">
            <div class="page splash" data-page="splash">
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
       setTimeout('go2Main()', 3000);
    })

</script>
