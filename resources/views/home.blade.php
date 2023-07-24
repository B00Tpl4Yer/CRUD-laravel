@extends('komponen.navbar')

@section('main')

<div class="main-panel">
    <div class="container">
      @if (session('success'))
      <div class="alert alert-info alert-dismissible fade show w-50 position-fixed top-10 start-50 translate-middle" role="alert" style="z-index: 9999;">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="panel-header">
        <div class="page-inner bg-warning-gradient py-5">

        </div>
      </div>
      <div class="page-inner mt--5">
        <div class="row mt--2">
          <div class="col-md-12">
            <div class="card full-height">
              <div class="card-body">
                <div class="card-title text-center">
                  kata pengantar
                </div>
                <div class="card-category">
                  <p class="text-justify">
                   
Dengan rasa syukur dan apresiasi, kami mengucapkan terima kasih kepada semua pihak yang telah berkontribusi dalam pembuatan project web pertama ini. Dukungan, kerjasama, dan masukan berharga dari kelompok dan pengguna yg telah membantu menciptakan project web yang bermanfaat dan berkualitas. Semoga project ini memberikan manfaat dan menjadi langkah awal dalam perjalanan kami dalam dunia pengembangan web dan teknologi. Terus berinovasi, belajar, dan berkembang untuk meraih hasil yang lebih baik di masa depan.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
                  
@endsection
