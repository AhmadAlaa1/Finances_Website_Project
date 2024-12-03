@extends('layouts.app')

@section('body')

<div class="site-blocks-cover overlay" style="background-image: url(images/img_1.jpg);" data-aos="fade" id="home-section">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-10 mt-lg-5 text-center">
          <div class="slide">
            <h1 class="text-uppercase mb-5" data-aos="fade-up">Payment Services</h1>
            <div data-aos="fade-up" data-aos-delay="100">
              <a href="#" target="_blank" class="btn btn-primary mr-2 mb-2">Get In Touch</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="site-section cta-big-image" id="about-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Transfer Money</h2>
        </div>
      </div>
      <div class="row align-items-center">
        <!-- Image Section -->
        <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
          <figure class="circle-bg">
            <img src="images/img_2.jpg" alt="Transfer Illustration" class="img-fluid rounded">
          </figure>
        </div>
        
        <!-- Form Section -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <form method="post" class="p-4 border rounded " method="POST" action="{{route('payment.store')}}">
            @csrf
            <div class="mb-4">
              <label for="inputid" class="form-label">User ID</label>
              <input type="text" class="form-control" name="userid" id="inputid" placeholder="Enter User's ID" required>
            </div>
            <div class="mb-4">
              <label for="inputamount" class="form-label">Amount</label>
              <input type="number" class="form-control" name="amount" id="inputamount" placeholder="Enter the amount you want to transfer" min="1" required>
            </div>
            <div>
              <button type="submit" class="btn btn-primary w-100">Transfer</button>
            </div>
          </form>
          @if (session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
          @endif

          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
        </div>
      </div>
         
      <div class="container mt-5">
  <div class="row mb-5 justify-content-center">
    <div class="col-md-8 text-center">
      <h2 class="section-title mb-3 mt-5" data-aos="fade-up" data-aos-delay="">Request Money</h2>
    </div>
  </div>
  <div class="row align-items-center">
    <!-- Image Section -->
    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
      <figure class="circle-bg">
        <img src="images/img_3.jpg" alt="Request Money Illustration" class="img-fluid rounded">
      </figure>
    </div>
    
    <!-- Form Section -->
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <form method="post" class="p-4 border rounded bg-light shadow-sm" action="{{route('request.store')}}">
        @csrf
        <div class="mb-4">
          <label for="requesterid" class="form-label">User ID You Want to Request From</label>
          <input type="text" class="form-control" name="requesterid" id="requesterid" placeholder="Enter User ID" required>
        </div>
        <div class="mb-4">
          <label for="amountrequest" class="form-label">Amount</label>
          <input type="number" class="form-control" name="amountrequest" id="amountrequest" placeholder="Enter the amount you want to request" min="1" required>
        </div>
        <div class="mb-4">
          <label for="message" class="form-label">Message (Optional)</label>
          <textarea class="form-control" name="message" id="message" placeholder="Add a note or reason for the request" rows="3"></textarea>
        </div>
        <div>
          <button type="submit" class="btn btn-primary w-100">Request Money</button>
        </div>
      </form>

      @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
      @endif

      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      
    </div>
  </div>
</div>

    </div>  
  </div>

@endsection