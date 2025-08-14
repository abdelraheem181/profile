@extends('website.layout')

@section('main')
                  <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Resume</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0">Experience</h2>
                                <!-- Download resume button-->
                                <!-- Note: Set the link href target to a PDF file within your project-->
                                <a class="btn btn-primary px-4 py-3" href="assets/CV.PDF" download="cv">
                                    <div class="d-inline-block bi bi-download me-2"></div>
                                    Download Resume
                                </a>
                            </div>
                            <!-- Experience Card 1-->
                            @foreach ($experiences as $experience)
                                <div class="card shadow border-0 rounded-4 mb-5">
                                    <div class="card-body p-5">
                                        <div class="row align-items-center gx-5">
                                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                                <div class="bg-light p-4 rounded-4">
                                                    <div class="text-primary fw-bolder mb-2">{{ $experience->start_date }} - {{ $experience->end_date }}</div>
                                                    <div class="small fw-bolder">{{ $experience->job_title }}</div>
                                                    <div class="small text-muted">{{ $experience->company }}</div>
                                                    <div class="small text-muted">{{ $experience->location }}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div>{{ $experience->description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                        <!-- Education Section-->
                        <section>
                            <h2 class="text-secondary fw-bolder mb-4">Education</h2>
                            <!-- Education Card 1-->
                            @foreach ($educations as $education)
                                <div class="card shadow border-0 rounded-4 mb-5">
                                    <div class="card-body p-5">
                                        <div class="row align-items-center gx-5">
                                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                                <div class="bg-light p-4 rounded-4">
                                                    <div class="text-secondary fw-bolder mb-2">{{ $education->start_date }} - {{ $education->end_date }}</div>
                                                    <div class="mb-2">
                                                        <div class="small fw-bolder">{{ $education->institution }}</div>
                                                        <div class="small text-muted">{{ $education->location }}</div>
                                                    </div>
                                                    <div class="fst-italic">
                                                        <div class="small text-muted">{{ $education->degree }}</div>
                                                        <div class="small text-muted">{{ $education->field_of_study }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div>{{ $education->description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>

                        </section>
                        <!-- Divider-->
                        <div class="pb-5"></div>
                        <!-- Skills Section-->
                        <section>
                            <!-- Skillset Card-->
                            <div class="card shadow border-0 rounded-4 mb-5">

                                <div class="card-body p-5">
                                    <!-- Professional skills list-->
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Professional Skills</span></h3>
                                        </div>
                                        @foreach($skills->chunk(3) as $skill)
                                            <div class="row row-cols-1 row-cols-md-3 mb-4">
                                                @foreach($skill as $item)
                                                    <div class="col mb-4 mb-md-0">
                                                        <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">{{ $item->name }}</div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @endforeach

                                    </div>
                                    <!-- Languages list-->
                                    <div class="mb-0">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-code-slash"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Languages</span></h3>
                                        </div>

                                        @foreach ($languages->chunk(3) as $languageChunk)
                                            <div class="row row-cols-1 row-cols-md-3 mb-4">
                                                @foreach($languageChunk as $item)
                                                    <div class="col mb-4 mb-md-0">
                                                        <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">{{ $item->name }}</div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
@endsection