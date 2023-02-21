<!-- Modal trigger button -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalId">
                            Pilih Produk
                        </button>
                                
                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Produk {{ Auth::user()->namaumkm }}</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fe fe-x"></i></button>
                                    </div>
                                    <div class="modal-body px-5">
                                        <!-- <input type="text" name="search" autocomplete="off" class="form-control" placeholder="Search"> -->
                                        <form action="{{ route('detail.store', $items->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $items->id }}" name="transcation_id">

                                            @forelse($product as $data)
                                            <div class="my-2">
                                                <input class="form-check-input" type="radio" value="{{ $data->id }}" name="product_id" id="product_id">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $data->name }}</h5>
                                                        <p class="card-text">Rp.{{ $data->price }},00</p>
                                                        <p class="text-muted">Stok : {{ $data->stock }}</p>
                                                    </div>
                                                </div>
                                                <input type="number" name="qty" class="form-control" placeholder="masukkan jumlah">
                                            </div>
                                            @empty
                                                <p>Tidak ada data</p>
                                            @endforelse
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                            const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                        
                        </script>