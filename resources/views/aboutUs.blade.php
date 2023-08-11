@extends('layout.layout')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">        
        
        <div class="bg-light py-5">
          <div class="container py-5">
            <div class="row mb-4">
              <div class="col-lg-5">
                <h2 class="display-4 font-weight-light">Tim Pengembang</h2>
                <p class="font-italic text-nowrap">Kontak tim pengembang website admin Inovasi Budaya Sucofindo.</p>
              </div>
            </div>
        
            <div class="row text-center" style="justify-content: center">
              <!-- Team item-->
              <div class="col-xl-3 col-sm-6 mb-5 " style="height: 50vh">
                <div class="bg-white rounded shadow-sm py-5 px-4" style="height: 55vh"><img src="{{asset('public/storage/assets/profilKemal.jpg/')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 shadow-sm" style="height: 14vh; width: 14vh">
                  <h5 class="mb-0">Alwan Kemal</h5><span class="small text-uppercase text-muted fst-italic">"peluang itu tidak akan pernah terjadi jika bukan kita sendiri yang membuatnya"</span>
                  <ul class="social mb-3 list-inline">
                    <a href="mailto:alwankemal128@gmail.com">
                        <i class='bx bxs-envelope' ></i>
                    </a>
                    <a href="https://instagram.com/alwankemal?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                    <a href="https://t.me/AlwanKemal" target="_blank">
                        <i class='bx bxl-telegram' ></i>
                    </a>
                    <a href="https://wa.me/+6283897558055?text=Website%20perlu%20diperbaiki" target="_blank">
                        <i class='bx bxl-whatsapp' ></i>
                    </a>
                  </ul>
                </div>
              </div>
              <!-- End-->
        
              <!-- Team item-->
              <div class="col-xl-3 col-sm-6 mb-5" style="height: 50vh">
                <div class="bg-white rounded shadow-sm py-5 px-4" style="height: 55vh"><img src="{{asset('public/storage/assets/profilRovino.jpg/')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 shadow-sm" style="height: 14vh; width: 14vh">
                  <h5 class="mb-0">Muhammad Rovino Sanjaya</h5><span class="small text-uppercase text-muted fst-italic">"Jika ada yang simpel, kenapa tidak?"</span>
                  <ul class="social mb-0 list-inline">
                    <a href="https://twitter.com/Rovino_rs" target="_blank">
                        <i class='bx bxl-twitter' ></i>
                    </a>
                    <a href="mailto:rovino.rs@gmail.com">
                        <i class='bx bxs-envelope' ></i>
                    </a>
                    <a href="https://wa.me/+6282281659343?text=Website%20perlu%20diperbaiki" target="_blank">
                        <i class='bx bxl-whatsapp' ></i>
                    </a>
                    <a href="https://github.com/Soviena" target="_blank">
                        <i class='bx bxl-github' ></i>
                    </a>
                  </ul>
                </div>
              </div>
              <!-- End-->
        
              <!-- Team item-->
              <div class="col-xl-3 col-sm-6 mb-5" style="height: 50vh">
                <div class="bg-white rounded shadow-sm py-5 px-4"style="height: 55vh"><img src="{{asset('public/storage/assets/profilRafif.jpg/')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 shadow-sm" style="height: 14vh; width: 14vh">
                  <h5 class="mb-0">Rizal Rafif Setiawan</h5><span class="small text-uppercase text-muted fst-italic">"Hidup memang tidak adil, jadi biasakan dirimu"</span>
                  <ul class="social mb-0 list-inline">
                    <a href="https://www.facebook.com/shinjie.kagamine?mibextid=ZbWKwL" target="_blank">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="https://t.me/ItsmeFiffah" target="_blank">
                        <i class='bx bxl-telegram' ></i>
                    </a>
                    <a href="https://instagram.com/shinjiekagamine?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                    <a href="https://wa.me/+6282122147145?text=Website%20perlu%20diperbaiki" target="_blank">
                        <i class='bx bxl-whatsapp' ></i>
                    </a>
                  </ul>
                </div>
              </div>
              <!-- End-->
        
            </div>
          </div>
        </div>
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                    document.write(new Date().getFullYear());
                    </script>
                    , Dibuat oleh 
                    <a href="https://sucofindobandung.com/" target="_blank" class="footer-link fw-bolder">Sucofindo Bandung</a>
                </div>
                <div>
                    <a href="https://github.com/Soviena/inovasi-budaya-admin" target="_blank" class="footer-link me-4">Support</a>
                </div>
            </div>
        </footer>
    </div>
</div>
        
<div class="content-backdrop fade"></div>
</div>
    
@endsection