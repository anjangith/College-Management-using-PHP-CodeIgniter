<?php include("inc/loginheader.php"); ?>
<?php $username= $this->session->userdata('username');
       $email_id=$this->session->userdata('email');
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col">

<div class="card mt-3 text-center col-md-12 col-xs-12" style="width: 20rem;">
<div style="width:100%; text-align:center">
<img class="mt-4" src="<?php echo base_url('assets/images/user.png'); ?>" alt="Card image cap" width="50" height="50">
</div>
<div class="card-body">
  <h5 class="card-title">Welcome <?php echo $username ?></h5>
  <p> <?php echo $email_id ?></p>
  <a href="#" class="btn btn-primary">Profile</a>
</div>
</div>



    </div>
    <div class="col-md-6 col-xs-12">
      <?php if($error = $this->session->flashdata('message')):?>
        <div class="row">
            <div class="col-md-12 mt-3">
              <div class="alert alert-dismissible alert-success">
                <?php echo $error ?>
              </div>
            </div>
        </div>
      <?php endif; ?>

      <div class="row mt-3">
        <div class="col mt-3">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('assets/images/study.jpg'); ?>" class="card-img-top" alt="Study">
            <div class="card-body">
              <h5 class="card-title">General Knowledge</h5>
              <p class="card-text">Prepare for all the general knowledge Questions out there which is basically asked in Interview Preparations</p>
              <a href="#" class="btn btn-primary">Prepare</a>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('assets/images/study2.jpg'); ?>" class="card-img-top" alt="Study">
            <div class="card-body">
              <h5 class="card-title">Aptitude</h5>
              <p class="card-text">Prepare for all the Aptitude Questions out there which is basically asked in Interview Preparations</p>
              <a href="#" class="btn btn-primary">Prepare</a>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('assets/images/study2.jpg'); ?>" class="card-img-top" alt="Study">
            <div class="card-body">
              <h5 class="card-title">APSC</h5>
              <p class="card-text">Prepare for all the APSC Questions out there which is basically asked in Interview Preparations</p>
              <a href="#" class="btn btn-primary">Prepare</a>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('assets/images/study.jpg'); ?>" class="card-img-top" alt="Study">
            <div class="card-body">
              <h5 class="card-title">TET</h5>
              <p class="card-text">Prepare for all the TET Questions out there which is basically asked in Interview Preparations</p>
              <a href="#" class="btn btn-primary">Prepare</a>
            </div>
          </div>
        </div>
      </div>


    <h3 class="display-2">Top Students</h3>
    <div id="country_table"></div>
    <div align="right" id="pagination_link"></div>


    </div>
    <div class="col">

        <h3 class="display-4 text-center">SUBJECTS</h3>
        <ul class="list-group">
        <?php if(count($categories)):?>
          <?php foreach($categories as $category): ?>

          <li class="list-group-item d-flex justify-content-between align-items-center" id="<?php echo $category->c_id ?>" >
            <?php $name= $category->c_name ?>
            	<?php echo anchor('users/category/'.$category->c_id,$name, 'class="nav-link text-bold"') ?>
          </li>

      <?php endforeach;?>
    </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php include("inc/footer.php"); ?>
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Ajax_pagination/pagination/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }

 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });

});
</script>
