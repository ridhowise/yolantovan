@extends('layouts.index') 
@section('content')

  <main id="main">
  

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
      
        <!-- {{-- @foreach ($Posts as $Post) --}} -->
        <h2>{{$Postz->nama}}</h2>
        <!-- {{-- @endforeach --}} -->

      </div>
    </div><!-- End Breadcrumbs -->

       <!-- ======= Features Section ======= -->
       {{-- style="margin-top:100px" --}}
      <section id="courses" class="courses" >
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100" >
          @foreach ($Posts as $Post)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="/images/{{$Post->image}}" style="height:15vw; width:100%; object:cover" class="img-fluid" alt="...">
              <div class="course-content">
                <h3>{{$Post->title}}</h3>
                <p>{{$Post->subtitle}}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <a  href="/kategori/{{$Post->kategori->slug}}/{{$Post->slug}}" class="btn btn-primary " >Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center  mt-4 mt-md-4">
            {{$Posts->links('pagination::bootstrap-4')}}
          </ul>
        </nav>

       
      </div>
    </section><!-- End Features Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        

      </div>
    </section><!-- End About Section -->

   


  </main><!-- End #main -->


	@endsection