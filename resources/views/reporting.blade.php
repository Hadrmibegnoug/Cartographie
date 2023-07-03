@extends('layouts.TableauBord')

@section('content')

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

            <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="zoom-out">
          <div class="row gy-1">
            <div class="col-lg-6 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <p>"Migration Insights: Visualisation des données migratoires"</p>
                </div>
              </div><!-- End Stats Item -->
          </div>

          <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end=" {{$pshTotal}} " data-purecounter-duration="1" class="purecounter"></span>
                <p>PSH</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $migrantTotal }}" data-purecounter-duration="1" class="purecounter"></span>

                <p>nombre de migrants</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $competenceTotal }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>competences</p>
              </div>
            </div><!-- End Stats Item -->

          </div>

        </div>
      </section><!-- End Stats Counter Section -->
              <!-- ======= Stats Counter Section ======= -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <p> Profil des <span> Migrants </span>: Analyse et Répartitions en Graphes</p>
                {{-- <button onclick="generatePDF()" class="btn btn-danger">génerer un report</button> --}}
              </div>
            </div>
            <div class="row">
                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="150">
                    <div id="myDiv" style="width:100%;max-width:700px" class="fst-italic"></div>
                </div><!-- end col-->
                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div id="myPlot" style="width:100%;max-width:700px" class="fst-italic"></div>
                </div><!-- end col-->
            </div>
          </section>
          <!-- End About Section -->
              <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Nos Statistiques regionale</h2>
                <p>Analyse et répartition par<span>Région</span></p>
            </div>

            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                    <h4>NKC</h4>
                </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                    <h4>NDB</h4>
                </a><!-- End tab nav item -->

                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                    <h4>Rosso</h4>
                </a>
                </li><!-- End tab nav item -->

            </ul>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="tab-header text-center">
                        <p>Répartition</p>
                        <h3>Nouakchott</h3>
                    </div>
                    <div class="row gy-5">
                        <div class="col-xl-6 menu-item">
                            <div id="natNktt" style="width:100%;max-width:700px" class="fst-italic"></div>
                        </div><!-- Menu Item -->
                        <div class="col-xl-6 menu-item">
                            <div id="compNktt"  class="fst-italic"></div>
                        </div><!-- Menu Item -->
                    </div>
                </div>
                <!-- End Starter Menu Content -->

                <div class="tab-pane fade" id="menu-breakfast">

                    <div class="tab-header text-center">
                        <p>Répartition</p>
                        <h3>Nouadhibou</h3>
                    </div>

                    <div class="row gy-5">
                        <div class="col-xl-12 menu-item">
                            <h4>Les données ne sont pas encore disponible ...</h4>
                        </div>
                    </div>

                </div>
                <!-- End Breakfast Menu Content -->

                <div class="tab-pane fade" id="menu-lunch">
                    <div class="tab-header text-center">
                        <p>Répartition</p>
                        <h3>Rosso</h3>
                    </div>

                    <div class="row gy-5">
                        <div class="col-xl-12 menu-item">
                            <h4>Les données ne sont pas encore disponible ...</h4>
                        </div>
                    </div>
                </div>
                <!-- End Dinner Menu Content -->

            </div>

            </div>
        </section><!-- End Menu Section -->

        </div>
        </section><!-- End About Section -->
          <script>
                var migrantTotal = @json($migrantTotal);
                var migrantRegion = @json($migrantRegion);
                var migrantCompentence = @json($migrantCompentence);
                var migrantNationalite = @json($migrantNationalite);
                var migrantNationaliteNKTT = @json($migrantNationaliteNKTT);
                var migrantCompentenceNKTT = @json($migrantCompentenceNKTT);
                console.log(migrantCompentenceNKTT);
          </script>
          <script src="js/graph.js"></script>
          <script>
            // Fonction pour générer le rapport PDF
            function generatePDF() {
              // Sélectionne l'élément contenant le contenu que tu souhaites convertir en PDF
              const element = document.body;

              // Options pour la conversion en PDF
                const options = {
                    marginTop:  0,
                    filename: 'rapport.pdf',
                    image: { type: 'jpeg', quality: 1 },
                    html2canvas: { scale: 1 },
                    jsPDF: { unit: 'in', format: 'a3', orientation: 'landscape' }
                };



              // Utilise html2pdf pour convertir le contenu en PDF
              html2pdf().set(options).from(element).save();
            }
          </script>

@endsection

