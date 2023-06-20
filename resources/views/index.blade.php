@extends('layouts.Accueil')

@section('content')


     <!-- ======= About Section ======= -->
     <style>
        .custom-checkbox:checked {
                background-color: #FB333C;
                border-color: #FB333C;
                }

     </style>
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Croissant rouge mauritanien</h2>
            <p>Découvrir Notre <span>Cartographie</span></p>
          </div>
          <div class="row gy-4">
                <div class="call-us">
                    <p>Recherchez les infos des migrants que vous souhaitez</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-checkbox" type="checkbox" id="checkbox-competence" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Competence</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-checkbox" type="checkbox" id="checkbox-sexe" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Sexe</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-checkbox" type="checkbox" id="checkbox-poste" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Poste de service humanitaire</label>
                    </div>
                    <button type="button" class="btn btn-danger" id="btn">search</button>
                    {{-- <button id="btn" style="margin: 10px;">search</button> --}}
                        {{-- <input class="form-check-input" type="checkbox" value="" id="checkbox-competence">
                        <label class="form-check-label" for="flexCheckDefault">
                            Competence
                        </label>
                        <input type="text" id="input" style="margin-top: 4%"  class="check"><br>
                        <input type="checkbox" name="" id="checkbox-competence" class="check">Competence
                        <input type="checkbox" name="" id="checkbox-sexe" class="check"> Sexe
                        <input type="checkbox" name="" id="checkbox-poste" class="check">Poste de service humanitaire
                        <button id="btn" style="margin: 10px;">search</button> --}}
                </div>
            </div>

          <div class="row gy-4">
            <div class="col-lg-20 position-relative about-img" id="map" style="" data-aos="fade-up" data-aos-delay="110">
              <!-- <div class="call-us position-absolute">
                <h4>Book a Table</h4>
                <p>+1 5589 55488 55</p>
              </div> -->
            </div>
            <!-- <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
              <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                </p>

                <div class="position-relative mt-4">
                  <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
                  <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                </div>
              </div> -->
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <script>
        var regions = @json($regions);
        var psh = @json($psh);
        var migrant = @json($migrants);
        var competence = @json($competence);
        var sexe = @json($sexe);
       // console.log(migrant);
      </script>
      <script src="js/script.js"></script>

@endsection
