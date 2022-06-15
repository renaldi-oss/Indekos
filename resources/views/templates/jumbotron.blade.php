<div class="jumbotron jumbotron-fluid bg jumbotron-index">
  <div class="container text-center text-dark">
    <h1 class="display-1">INDEKOS</h1>
    <p class="lead text-monospace">Tugas proyek</p>
    
    <div class="row text-center mb-3">

      @if (Auth::guard('admin')->check())
        <div class="col-md-3 offset-md-3">
          <a href="/profile"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Admin</button></a>
        </div>
        <div class="col-md-3">
          <a href="/dashboard"><button type="button" class="btn btn-primary btn-block font-weight-bold">Dashboard Admin</button></a>
        </div>
      @elseif (Auth::guard('company')->check())
        <div class="col-12">
          <div class="row text-center mb-3">
            <div class="col-md-3 offset-md-3">
              <a href="/profile"><button type="button" class="btn btn-primary btn-block font-weight-bold">My Profile</button></a>
            </div>
            <div class="col-md-3">
              <a href="/owner/rooms/create"><button type="button" class="btn btn-primary btn-block font-weight-bold">Create Room</button></a>
            </div>
          </div>
          <div class="row text-center">
            <div class="col"></div>
            <div class="col">
              <a href="/owner/rooms">
                <button type="button" class="btn btn-primary btn-block font-weight-bold">
                  Manage Room
                </button>
              </a>
            </div>
            <div class="col"></div>
            {{-- <div class="col-md-3">
              <a href="/company/applications">
                <button type="button" class="btn btn-primary btn-block font-weight-bold">
                  <?php
                  $idCompany = Auth::guard('company')->user()->id;
                  $activeApplication = DB::table('applications')
                          ->join('jobs', 'applications.job_id', '=', 'jobs.id')
                          ->where('applications.status', '=', -1)
                          ->where('jobs.company_id', '=', $idCompany)
                          ->first();                    
                  ?>
                  @if (!empty($activeApplication))
                    <i class='fa fa-exclamation-circle'></i>
                  @endif
                  Manage Applications
                </button>
              </a>
            </div> --}}
          </div>
        </div>
      @elseif (Auth::guard('applicant')->check())
        <div class="col-12">
          <div class="row text-center mb-3">
            <div class="col-md-3 offset-md-3">
              <a href="/profile"><button type="button" class="btn btn-primary btn-block font-weight-bold">My Profile</button></a>
            </div>
            <div class="col-md-3">
              <a href="/cv">
                <button type="button" class="btn btn-primary btn-block font-weight-bold">
                  @if (Auth::guard('applicant')->user()->cv == '')
                    <i class='fa fa-exclamation-circle'></i>
                  @endif
                  Curriculum Vitae
                </button>
              </a>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-3 offset-md-3">
              <a href="/applicant/applications">
                <button type="button" class="btn btn-primary btn-block font-weight-bold">
                  <?php
                    $idApplicant = Auth::guard('applicant')->user()->id;
                    $activeApplication = DB::table('applications')
                            ->where('applications.status', '!=', -1)
                            ->where('applications.applicant_id', '=', $idApplicant)
                            ->where('applications.confirm', '=', 0)
                            ->first();                    
                  ?>
                  @if (!empty($activeApplication))
                    <i class='fa fa-exclamation-circle'></i>
                  @endif
                  Manage Applications
                </button>
              </a>
            </div>
            <div class="col-md-3">
              <a href="/search"><button type="button" class="btn btn-primary btn-block font-weight-bold">Find Spesific Job</button></a>
            </div>
          </div>
        </div>
      @else
        <div class="col text-center">
            <a href="/register" type="button" class="btn btn-primary align-content-center">Daftar Sekarang</a>
        </div>
      @endif

    </div>
  </div>
</div>