@extends('layouts.app')

@section('body')
    
  <div class="site-section cta-big-image" id="about-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
        </div>
      </div>
      <div class="container">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header text-center">
                <h2>Profile Page</h2>
            </div>
            <div class="card-body">
                <!-- Profile Information -->
                <div id="profile-view">
                    <p><strong>Name:</strong> {{$name}}</p>
                    <p><strong>Email:</strong> {{$email}}</p>
                    <p><strong>Your Amount:</strong> {{$amount}}</p>
                    <button class="btn btn-primary" id="edit-btn">Edit Profile</button>
                </div>

                <!-- Profile Edit Form -->
                <div id="profile-edit" style="display: none;">
                    <form method="post" id="edit-form" action="{{route('profile.update')}}" >
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="new_username" class="form-control" id="name" value={{$name}}>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Email</label>
                            <input type="email" name="new_email" class="form-control" id="age" value={{$email}}>
                        </div>
                       
                        <button type="submit" class="btn btn-success" id="save-btn">Save</button>
                        <button type="button" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const profileView = document.getElementById('profile-view');
        const profileEdit = document.getElementById('profile-edit');
        const editBtn = document.getElementById('edit-btn');
        const saveBtn = document.getElementById('save-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        editBtn.addEventListener('click', () => {
            profileView.style.display = 'none';
            profileEdit.style.display = 'block';
        });

        cancelBtn.addEventListener('click', () => {
            profileView.style.display = 'block';
            profileEdit.style.display = 'none';
        });

        saveBtn.addEventListener('click', () => {
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const country = document.getElementById('country').value;
            const field = document.getElementById('field').value;

            profileView.innerHTML = `
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Age:</strong> ${age}</p>
                <p><strong>Country:</strong> ${country}</p>
                <p><strong>Field:</strong> ${field}</p>
                <button class="btn btn-primary" id="edit-btn">Edit Profile</button>
            `;

            profileView.style.display = 'block';
            profileEdit.style.display = 'none';

            document.getElementById('edit-btn').addEventListener('click', () => {
                profileView.style.display = 'none';
                profileEdit.style.display = 'block';
            });
        });
    </script>

      </div>    
    </div>  

    
@endsection('body')