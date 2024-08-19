@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Contact Us</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <div class="col-md-6 mb-4">
            <h3>Our Location</h3>
            <p>123 Dance Street, Rhythm City, RC 12345</p>
            <h3>Contact Information</h3>
            <p>Email: info@feeldance.com</p>
            <p>Phone: (123) 456-7890</p>
            <h3>Opening Hours</h3>
            <p>Monday - Friday: 9:00 AM - 9:00 PM</p>
            <p>Saturday: 10:00 AM - 6:00 PM</p>
            <p>Sunday: Closed</p>
        </div>
    </div>
</div>
@endsection
