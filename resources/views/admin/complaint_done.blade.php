@extends('layouts.templateadmin')
@section('title', $title)
@section('content')
<style>
    /* Experiences */
    ul.experiences {
        padding-left: 15px;
        margin-top: -1px;
    }
    ul.experiences li {
        padding-left: 33px;
        margin-bottom: 2.5em;
        list-style: none;
    }
    .when {
        float: right;
        color: #b9b9b9;
        font-style: italic;
    }
    .description {
        display: block;
        margin-top: 0.5em;
    }


    /* BORDERS AND BULLETS */

    p {
        /*CSS reset*/
        margin-bottom: 0;
    }

    ul.experiences li {
        position:relative; /* so that pseudoelements are positioned relatively to their "li"s*/
        /* use padding-bottom instead of margin-bottom.*/ 
        margin-bottom: 0; /* This overrides previously specified margin-bottom */
        padding-bottom: 2.5em;
    }

    ul.experiences li:after {
        /* bullets */
        content: url("{{ asset('images/Plain_Disc_10_black.svg.png')}}");
        position: absolute;
        left: -21px; /*adjust manually*/
        top: 0px;
    }

    ul.experiences li:before {
        /* lines */
        content:"";
        position: absolute;
        left: -16px; /* adjust manually */
        border-left: 1px dashed #bababa;
        height: 100%;
        width: 1px;
    }

    ul.experiences li:first-child:before {
    /* first li's line */
    top: 6px; /* moves the line down so that it disappears under the bullet. Adjust manually */
    }

    ul.experiences li:last-child:before {
        /* last li's line */
    height: 6px; /* shorten the line so it goes only up to the bullet. Is equal to first-child:before's top */
    }
</style>
<div class="row justify-content-center">
    <div class="col-12">
        <!-- <div class="row align-items-center mb-2">
            <div class="col">
                <h2 class="h5 page-title">Komplain UMKM Teratasi</h2>
                <p></p>
            </div>
        </div> -->

        <div class="row">
            <!-- Recent Activity -->
            <div class="col-md-12 col-lg-12">
                <div class="card shadow">
                    <div class="card-header">
                        <strong class="card-title">List komplain</strong>
                        <!-- <a class="float-right small text-muted" href="./pesananbaru.html">Lihat semua</a> -->
                        <!-- <a class="btn btn-sm btn-outline-primary float-right" href="statistik.html" role="button" data-toggle="modal" data-target="#ajukanKomplain">Komplain teratasi<span class="fe fe-chevron-right fe-16 ml-2"></span></a> -->
                    </div>
                    <div class="card-body my-n2">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No. Komplain</th>
                                    <th>Tanggal</th>
                                    <th>Nama/E-mail</th>
                                    <th>Subjek</th>
                                    <th>Deskripsi Masalah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td colspan="7">Sedang ditangani</td>
                                </tr> -->
                                @forelse($complaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->complaint_id }}</td>
                                    <td>{{ $complaint->created_at }}</td>
                                    <td><p>{{ $complaint->user_umkm->namaumkm }}<br>{{ $complaint->user_umkm->email }}</p></td>
                                    <th scope="col">{{ $complaint->subject }}</th>
                                    <td>{{ $complaint->desc }}</td>
                                    <td>
                                        @if($complaint->status == 'Menunggu konfirmasi')
                                        <span class="badge rounded-pill bg-secondary text-light">Menunggu konfirmasi</span>
                                        @elseif($complaint->status == 'Sedang diproses')
                                        <span class="badge rounded-pill bg-primary text-light">Sedang diproses</span>
                                        @elseif($complaint->status == 'Selesai')
                                        <span class="badge rounded-pill bg-success text-light">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                <a class="dropdown-item" data-toggle="collapse" href="#collapseExample{{ $complaint->complaint_id }}" role="button" aria-expanded="false" aria-controls="collapseExample"><span class="fe fe-corner-down-left mr-2"></span> Balas</a>
                                                <!-- <a class="dropdown-item" href="#"><span class="fe fe-check-square mr-2"></span> Sudah teratasi</a> -->
                                                <!-- <a class="dropdown-item" href="#">Tolak</a> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="collapse" id="collapseExample{{ $complaint->complaint_id }}">
                                    <td colspan=7>
                                         <div >
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="container">
                                                            <ul class="experiences">

                                                                <!-- Experience -->
                                                                <li class="green">
                                                                    <div class="where">Subjek : {{ $complaint->subject }}</div>
                                                                    <span class="badge rounded-pill bg-secondary text-light"> Dari : {{ $complaint->user_umkm->name }} ({{ $complaint->user_umkm->namaumkm }})</span>
                                                                    <div class="when">{{ date('D, d M Y, H:i', strtotime($complaint->created_at)) }}</div>
                                                                    <p class="description">Deskripsi masalah : {{ $complaint->desc }}</p>
                                                                </li>
                                                                @foreach($complaint->replies->sortBy('created_at') as $reply)
                                                                <li class="green">
                                                                    <!-- <div class="where">New York Times</div> -->
                                                                    @if($reply->from == Auth::user()->id)
                                                                    <span class="badge rounded-pill bg-info text-light"> Balasanmu</span>
                                                                    @else
                                                                    <span class="badge rounded-pill bg-secondary text-light"> Dari : {{ $complaint->user_umkm->name }} ({{ $complaint->user_umkm->namaumkm }})</span>
                                                                    @endif
                                                                    <!-- <p class="what green">Senior Online Editor</p> -->
                                                                    <div class="when">{{ date('D, d M Y, H:i', strtotime($reply->created_at)) }}</div>
                                                                    <div class="description">{!! html_entity_decode($reply->reply_desc) !!}</div>
                                                                </li>
                                                                @endforeach
                                                                <li>
                                                                    @if($complaint->status == 'Selesai' AND $complaint->admin_status == 'Selesai')
                                                                    <div class="when">{{ date('D, d M Y, H:i', strtotime($reply->created_at)) }}</div>
                                                                    <div class="description">Komplain sudah ditutup</div>
                                                                    @endif
                                                                </li>
                                                                <!-- <li class="green">
                                                                    <div class="where">New York Times</div>
                                                                    <p class="what green">Senior Online Editor</p>
                                                                    <div class="when">2012 - Present</div>

                                                                    <p class="description">Jelly-o pie chocolate cake...</p>
                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                    </div>
                                                    <div class="col-1 mt-1">
                                                        Balas ajuan :
                                                    </div>
                                                    <div class="col-5">
                                                        <form action="{{route('admin.reply_message', ['id' => $complaint->complaint_id])}}" method="post">
                                                            @csrf
                                                            <textarea id="editor" name="reply_desc"></textarea>
                                                            <button type="submit" class="btn btn-primary float-right mt-2">Balas</button>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               
                                @empty
                                <tr>
                                    <td colspan="7"><center><p>Tidak ada data</p></center></td>
                                </tr>
                                @endforelse
                                <!-- <tr>
                                    <td colspan="7">Belum ditangani</td>
                                </tr> -->
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- Striped rows -->
            
        </div> <!-- .row-->
    </div> <!-- .col-12 -->
</div> <!-- .row -->

<div class="modal fade" id="ajukanKomplain" tabindex="-1" role="dialog" aria-labelledby="Aturpengiriman2Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
                <div class=" d-flex flex-column">
                    <p class="h3 mb-3 d-flex justify-content-center">Ajukan komplain</p>
                    <p class="d-flex justify-content-center">Silahkan isi sesuai dengan keluhan anda mengenai aplikasi</p>
                    <br>
                    <div class="container">
                        <div class="container">
                            <form action="/umkm/complaint-action" method="post">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="subject">Subjek</label>
                                                <input type="text" name="subject" id="subject" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Deskripsi</label>
                                                <textarea name="description" class="form-control" id="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-primary" type="submit" style="width: 400px;">Ajukan</button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection