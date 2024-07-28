<?php require_once(HHEAD); ?>
<?php require_once(HBAR); ?>

<div class="hero" id="home">
    <div class="container">
        <h1 class="text-light">Welcome to Maha FC</h1>
        <p class="text-light">Transform Your Masterpieces into Reality!</p>
        <a href="#services" type="button" class="btn btn-primary">Our Services</a>
    </div>
</div>
<div id="about" class="container my-5 p-5">
    <h2 class="text-center">About Us</h2>
    <p class="text-center">Maha FC provides trusted printing and photocopying services based in Bali, Indonesia. With over a decade of experience, we are committed to delivering high-quality results that exceed expectations. Our skilled team will assist you with a variety of services, including binding and custom design. We prioritize quality with fast turnaround times and personal customer service, we are dedicated to completing your orders with complete attention and respect. Choose Maha FC to bring your ideas to life with extraordinary precision and professionalism.
</p>
</div>
<div style="background-color: #091222;">
    <div class="container p-5" id="services">
        <h2 class="mb-4 text-light">Our Services</h2>
        <div class="row align-content-stretch">
            <div class="col-md-4 d-flex align-content-stretch">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Photocopy</h5>
                        <p class="card-text">Get your documents photocopied at an affordable price with the best quality.</p>
                        <a href="#" class="mt-auto align-self-end btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-content-stretch">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Printing</h5>
                        <p class="card-text">Get your files printed at an affordable price with the best quality.</p>
                        <a href="#" class="mt-auto align-self-end btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-content-stretch">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Scanning</h5>
                        <p class="card-text">Get your documents scanned and saved digitally.</p>
                        <a href="#" class="mt-auto align-self-end btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-5" id="contact">
    <h2 class="mb-4">Contact Us</h2>
    <form>
        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

<?php require_once(HFOOT); ?>