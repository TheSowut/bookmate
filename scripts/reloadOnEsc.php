<script>
    $(document).ready(function() {
        window.addEventListener("keyup", function(e){
            if(e.keyCode == 27)
                location.reload();
        }, false);

        $('#goback').click(goBack = () => {
            location.reload();
        })
    })
</script>