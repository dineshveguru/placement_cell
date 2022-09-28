<?php

$base_url = "https://jntuacep.ac.in/placement_cell/student";
?>




<footer id="footer"  style="background-color: #000;">
        <div class="footer-top">
        <div class="container" >
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                    <a class="navbar-brand " href="dashboard.php">CAREER<span style="color:#ff8591"> CLUB</span> </a>
                    <div class="social-links">
                            <a target="_blank" href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a target="_blank" href= "mailto: team.simuleduco@gmail.com" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a target="_blank" href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h2 class="info-heading" style="color:#ff8591">For Students</h2>
                        <ul>
                            <li><a href="<?php echo $base_url; ?>/dashboard">Home</a></li>
                            <li><a href="<?php echo $base_url; ?>/companies">Companies</a></li>
                            <li><a href="<?php echo $base_url; ?>/news">News</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h2 class="info-heading" style="color:#ff8591">Legal</h2>
                        <ul>     
                                <li><a href="<?php echo $base_url; ?>/#">Terms of Service</a></li>
                                <li><a href="<?php echo $base_url; ?>/#">Privacy Policy</a></li>
                                <li><a href="<?php echo $base_url; ?>/#">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6" style="color:#ff8591">
                        <h2 class="info-heading" style="color:#ff8591">Quick Links</h2>
                        <ul>
                          
                            <li><a href="<?php echo $base_url; ?>/profile">Profile</a></li>
                            <li><a target="_blank" href = "mailto: team.simuleduco@gmail.com">CareerClub Support</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
<hr style="background-color: rgb(187, 187, 187);">
        <div class="container">
            <div class="copyright-virtual text-center">
                &copy; <?php echo date('Y'); ?> Copyright <strong><a href="<?php echo $base_url; ?>/dashboard">Career Club</a></strong>. All Rights Reserved
            </div>
        </div>
    </footer>



   

<!-- Update Profile Image Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_profile_image',function(){

        $('#update_profile_image').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_profile_imageid').val(data[0]);
        
    });
});

</script>



<!-- Delete Profile Image script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_profile_image',function(){

        $('#delete_profile_image').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_profile_imageid').val(data[0]);
    });
});

</script>






<!-- Update Coding Platform Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_coding_platforms',function(){

        $('#update_coding_platforms').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_coding_platformsid').val(data[0]);
            $('#platform').val(data[1]);
            $('#rank').val(data[2]);
            $('#profile_link').val(data[3]);
        
    });
});

</script>




   <!-- delete Coding Platform script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_coding_platforms',function(){

        $('#delete_coding_platforms').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_coding_platformsid').val(data[0]);
    });
});

</script>







<!-- Update Social Links Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_social_links',function(){

        $('#update_social_links').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_social_linksid').val(data[0]);
            $('#account').val(data[1]);
            $('#link').val(data[2]);
        
    });
});

</script>




   <!-- delete Social Links script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_social_links',function(){

        $('#delete_social_links').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_social_linksid').val(data[0]);
    });
});

</script>
















<!-- Update Offer Letters Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_offer',function(){

        $('#update_offer').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_offerid').val(data[0]);
            $('#company').val(data[2]);
            $('#package').val(data[3]);
             $('#offer_type').val(data[4]);
            $('#offer_link').val(data[5]);
        
    });
});

</script>




   <!-- delete Social Links script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_offer',function(){

        $('#delete_offer').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_offerid').val(data[0]);
    });
});

</script>

























<!-- Update Eductaion Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_education',function(){

        $('#update_education').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_educationid').val(data[0]);
            $('#school').val(data[1]);
            $('#stream').val(data[2]);
            $('#passing_year').val(data[3]);
            $('#gpa').val(data[4]);
        
    });
});

</script>

   <!-- delete Eductaion script -->
                     <script>
 $(document).ready(function(){
    $('body').on('click','.delete_education',function(){

        $('#delete_education').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_educationid').val(data[0]);
    });
});

</script>



<!-- Update Skills Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_skills',function(){

        $('#update_skills').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_skillsid').val(data[0]);
            $('#skill').val(data[1]);
        
    });
});

</script>

   <!-- delete Skills script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_skills',function(){

        $('#delete_skills').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_skillsid').val(data[0]);
    });
});

</script>

<!-- Update Certification Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_certification',function(){

        $('#update_certification').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_certificationid').val(data[0]);
            $('#platform').val(data[1]);
            $('#certificate_id').val(data[2]);
            $('#certification').val(data[3]);
            $('#certification_link').val(data[4]);
        
    });
});

</script>

   <!-- delete Certification script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_certification',function(){

        $('#delete_certification').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_certificationid').val(data[0]);
            $('#delete_certifice_id').val(data[1]);
    });
});

</script>








<!-- Update Workshop Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_workshop',function(){

        $('#update_workshop').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_workshopid').val(data[0]);
            $('#workshop').val(data[1]);
        
    });
});

</script>

   <!-- Delete Workshop script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_workshop',function(){

        $('#delete_workshop').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_workshopid').val(data[0]);
    });
});

</script>



<!-- Update Achievement Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_achievement',function(){

        $('#update_achievement').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_achievementid').val(data[0]);
            $('#achievement').val(data[1]);
        
    });
});

</script>

   <!-- Delete Achievement script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_achievement',function(){

        $('#delete_achievement').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_achievementid').val(data[0]);
    });
});

</script>



<!-- Update Positions Of Responsibilities Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_responsibility',function(){

        $('#update_responsibility').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_responsibilityid').val(data[0]);
            $('#responsibility').val(data[1]);
        
    });
});

</script>

   <!-- Delete Positions Of Responsibilities script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_responsibility',function(){

        $('#delete_responsibility').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_responsibilityid').val(data[0]);
    });
});

</script>










<!-- Update Research Paper Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_paper',function(){

        $('#update_paper').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_paperid').val(data[0]);
            $('#paper_name').val(data[1]);
            $('#paper_description').val(data[2]);
            $('#paper_link').val(data[3]);
        
    });
});

</script>

   <!-- Delete Research Paper Script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_paper',function(){

        $('#delete_paper').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_paperid').val(data[0]);
    });
});

</script>




<!-- Update Project Script -->

<script>
 $(document).ready(function(){
    $('body').on('click','.update_project',function(){

        $('#update_project').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_projectid').val(data[0]);
            $('#project_name').val(data[1]);
            $('#project_description').val(data[2]);
            $('#project_link').val(data[3]);
        
    });
});

</script>

   <!-- Delete Project Script -->
<script>
 $(document).ready(function(){
    $('body').on('click','.delete_project',function(){

        $('#delete_project').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_projectid').val(data[0]);
    });
});

</script>