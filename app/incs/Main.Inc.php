<!-- Content wrapper -->
<div class="content-wrapper">
                  <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                           <div class="card">
                              <div class="d-flex align-items-end row">
                                 <div class="col-sm-7">
                                    <div class="card-body">
                                       <h5 class="card-title text-primary">Welcome <?php echo $username; ?>! 🎉</h5>
                                       <p class="mb-4">
                                          We are happy to welcome you to our awesome app <span class="fw-bold">KoreanQuiz</span> once again. Check your new badge in
                                          your profile.
                                       </p>
                                       <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                                    </div>
                                 </div>
                                 <div class="col-sm-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                       <img
                                          src="src/assets/img/illustrations/man-with-laptop-light.png"
                                          height="140"
                                          alt="View Badge User"
                                          data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                          data-app-light-img="illustrations/man-with-laptop-light.png"
                                          />
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                           
                        <div class="col-md-12 col-lg-4 col-xl-4 order-0 mb-4">
                           <div class="card h-100">
                              <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h5 class="m-0 me-2">Engagement Statistics</h5>
                                    <small class="text-muted">0000 Scores</small>
                                 </div>
                                 <div class="dropdown">
                                    <button
                                       class="btn p-0"
                                       type="button"
                                       id="orederStatistics"
                                       data-bs-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                       <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                       <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                       <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-column align-items-center gap-1">
                                       <h2 class="mb-2">0000</h2>
                                       <span>Total Scores</span>
                                    </div>
                                    <div id="orderStatisticsChart"></div>
                                 </div>
                                 <ul class="p-0 m-0">
                                    <li class="d-flex mb-4 pb-1">
                                       <div class="avatar flex-shrink-0 me-3">
                                          <span class="avatar-initial rounded bg-label-primary"
                                             ><i class='bx bxs-book-reader'></i></span>
                                       </div>
                                       <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                          <div class="me-2">
                                             <h6 class="mb-0">Learn</h6>
                                             <small class="text-muted">Grammar, Meaning, Basic</small>
                                          </div>
                                          <div class="user-progress">
                                             <small class="fw-semibold">00S</small>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 pb-1">
                                       <div class="avatar flex-shrink-0 me-3">
                                          <span class="avatar-initial rounded bg-label-success"><i class='bx bx-question-mark'></i></span>
                                       </div>
                                       <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                          <div class="me-2">
                                             <h6 class="mb-0">Quiz</h6>
                                             <small class="text-muted">Random, Chapter, All</small>
                                          </div>
                                          <div class="user-progress">
                                             <small class="fw-semibold">00S</small>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 pb-1">
                                       <div class="avatar flex-shrink-0 me-3">
                                          <span class="avatar-initial rounded bg-label-info"><i class='bx bxs-edit-alt'></i></span>
                                       </div>
                                       <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                          <div class="me-2">
                                             <h6 class="mb-0">UBT Test</h6>
                                             <small class="text-muted">UBT</small>
                                          </div>
                                          <div class="user-progress">
                                             <small class="fw-semibold">00S</small>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                  </div>
                  <!-- / Content -->