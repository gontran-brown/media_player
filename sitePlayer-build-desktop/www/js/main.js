;(
    function($) {
        $(document).ready(function(){
           
            $("#btn-play").click(function(){
                html(load(document.querySelector("#video")));
                    //$("#debut"));
            });

            $("#btn-pause").click(function(){
                    //(document.querySelector("#video")).pause();
            });

            $("#btn-stop").click(function(){
                    //(document.querySelector("#video")).onload();
            });

            /*$("#btn-cut").click(function(){
                    $("#tableau").after({
                            $(document.createElement('tr').attr("id","taleau_fin"));
                    });
                    });*/
            });
    }
)(jQuery);
