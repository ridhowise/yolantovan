@extends('layouts.index') 
@section('content')

<main id="main">

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
      
      </div>
    </div><!-- End Breadc
<!-- ======= Breadcrumbs ======= -->


<!-- ======= Cource Post Section ======= -->
<section id="course-Post" class="course-Post">
  <div class="container" data-aos="fade-up">

    <div class="row">
   
        <div class="col-lg-12">
        <img src="/images/{{$Post->image}}" class="img-fluid" alt="">
      
        <h2 style="margin-top:60px;" > {{$Post->title}} </h2>
        <h3> {{$Post->subtitle}} </h3>
        <!-- <p> {{$Post->details}} </p> -->
        <div class="ckeditor">
      
          @php
            echo $Post->details
          @endphp	
        
        </div>
         
      </div>
      
    </div>

  </div>
</section><!-- End Cource Post Section -->


</main><!-- End #main -->


@endsection