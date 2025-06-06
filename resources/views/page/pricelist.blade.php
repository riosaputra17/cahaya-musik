<!-- produk Section start -->
<section class="products" id="products">
    <h2><span>Price List</span> Kami</h2>
    <p>
      Temukan pilihan paket terbaik sesuai kebutuhan acara Anda mulai dari musik hingga dekorasi, semua kami hadirkan dengan kualitas dan harga yang bersahabat.
    </p>
    <!-- <div class="row">
        <div class="product-card">
          <div class="product-icon">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
          </div>
          <div class="product-image">
            <img src="img/product/product_1.jpg" alt="product 1" />
          </div>
          <div class="product-content">
            <h3>Coffe kenangan</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
          </div>
          <div class="product-price">IDR 30K <span>IDR 55K</span></div>
        </div>
        <div class="product-card">
          <div class="product-icon">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#"  class="item-detail-button"><i data-feather="eye"></i></a>
          </div>
          <div class="product-image">
            <img src="img/product/product_1.jpg" alt="product 1" />
          </div>
          <div class="product-content">
            <h3>Coffe kenangan</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
          </div>
          <div class="product-price">IDR 30K <span>IDR 55K</span></div>
        </div>
        <div class="product-card">
          <div class="product-icon">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
          </div>
          <div class="product-image">
            <img src="img/product/product_1.jpg" alt="product 1" />
          </div>
          <div class="product-content">
            <h3>Coffe kenangan</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
          </div>
          <div class="product-price">IDR 30K <span>IDR 55K</span></div>
        </div>
      </div> -->
</section>
<!-- produk Section End -->

<!-- PriceList Section Start -->
<div class="cont s--inactive">
    <!-- cont inner start -->
    <div class="cont__inner">
        <!-- el start -->
        @php
            $jasas = \App\Models\Jasa::orderBy('nama_jasa', 'asc')->get();
            $customerId = Auth::user()?->customer?->customer_id;
        @endphp

        @foreach ($jasas as $index => $jasa)
            <div class="el">
                <div class="el__overflow">
                    <div class="el__inner">
                        <div class="el__bg"></div>
                        <div class="el__preview-cont">
                            <h2 class="el__heading">{{ strtoupper($jasa->nama_jasa) }}</h2>
                        </div>
                        <div class="el__content">
                            <div class="el__text-wrapper">
                                <div class="el__text">{{ $jasa->nama_jasa }}</div>

                                <div class="pricelist">
                                  <div class="detail_jasa">
                                    @foreach (explode('|', $jasa->list_services) as $service)
                                        <li>{{ trim($service) }}</li>
                                    @endforeach
                                    </div>
                                    <h2>Rp.{{ number_format($jasa->price, 0, ',', '.') }} Full Pack</h2>
                                    <p>
                                        Ingin sesuaiakan dengan event mu atau mengundang bintang
                                        tamu?<br />
                                        Konsultasi dengan admin kami agar mensukseskan acara anda !!
                                    </p>
                                </div>

                                @if (session()->has('user'))
                                    <!-- Tombol Order Now -->
                                    <a href="javascript:void(0);" onclick="showModal('{{ $jasa->jasa_id }}', '{{ e($jasa->nama_jasa) }}', '{{ $customerId }}')">
                                      <button class="btn-price" role="button">Order Now</button>
                                    </a>

                                @else
                                    <a href="{{ route('register') }}">
                                        <button class="btn-price" role="button">Order Now</button>
                                    </a>
                                @endif
                            </div>
                            <div class="el__close-btn"></div>
                        </div>
                    </div>
                </div>
                <div class="el__index">
                    <div class="el__index-back">{{ $index + 1 }}</div>
                    <div class="el__index-front">
                        <div class="el__index-overlay" data-index="{{ $index + 1 }}">{{ $index + 1 }}</div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- el end -->
        <!-- el start -->
        <!-- <div class="el">
          <div class="el__overflow">
            <div class="el__inner">
              <div class="el__bg"></div>
              <div class="el__preview-cont">
                <h2 class="el__heading">Forest</h2>
              </div>
              <div class="el__content">
                <div class="el__text">Forest</div>
                <div class="el__close-btn"></div>
              </div>
            </div>
          </div>
          <div class="el__index">
            <div class="el__index-back">5</div>
            <div class="el__index-front">
              <div class="el__index-overlay" data-index="5">5</div>
            </div>
          </div>
        </div> -->
        <!-- el end -->
    </div>
    <!-- cont inner end -->
</div>
<!-- PriceList Section End -->
