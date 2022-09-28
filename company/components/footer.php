<?php

$base_url = "https://jntuacep.ac.in/placement_cell/company";
?>



<footer id="footer">        
            <div class="container pt-5">
                <div class="copyright-virtual text-center font-weight-bold" style="color:#618CC2;">
                    &copy; <?php echo date('Y'); ?> Copyright <strong>Jntuacep.ac.in</strong>. All Rights Reserved
                </div>
            </div>
</footer>


<script> 
            $(document).ready(function() { 
                $("#search").on("keyup", function() { 
                    var value = $(this).val().toLowerCase(); 
                    $("#searchdata tr").filter(function() { 
                        $(this).toggle($(this).text() 
                        .toLowerCase().indexOf(value) > -1) 
                    }); 
                }); 
            }); 
 </script>

<!-- Update Company Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_company',function(){

        $('#update_company').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_companyid').val(data[0]);
            $('#dept').val(data[1]);
            $('#company_name').val(data[2]);
            $('#company_site').val(data[3]);
        
    });
});

</script>

   <!-- delete Company script -->
                     <script>
 $(document).ready(function(){
    $('body').on('click','.delete_company',function(){

        $('#delete_company').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_companyid').val(data[0]);
    });
});

</script>



<!-- Update News Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_news',function(){

        $('#update_news').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_newsid').val(data[0]);
            $('#dept').val(data[1]);
            $('#news_title').val(data[2]);
            $('#news').val(data[3]);
            $('#news_link').val(data[4]);
        
    });
});

</script>

   <!-- delete News script -->
                     <script>
 $(document).ready(function(){
    $('body').on('click','.delete_news',function(){

        $('#delete_news').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_newsid').val(data[0]);
    });
});

</script>


